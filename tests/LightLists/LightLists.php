<?php

// light-lists v1.0.1 — copied from uteq/agent-skills ux-schermontwerp/references/lichte-lijsten

declare(strict_types=1);

namespace Tests\LightLists;

use Closure;
use DOMElement;
use Illuminate\Cache\ArrayStore;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Testing\Fakes\EventFake;
use Illuminate\Testing\TestResponse;
use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\Response;

/**
 * Feature-test budgets, using one running application and invented row identities.
 * The host owns seeding, authentication, requests and AI fakes.
 *
 * @phpstan-type Measurement array{bytes: int, elements: int, alpine: int, livewire: int, queries: int, rows: list<string>, html: LightListsHtml, isHtml: bool}
 */
final class LightLists
{
    /** @var array<'queries'|'alpine'|'livewire'|'bytes'|'elements', int> */
    public const PER_ITEM = ['queries' => 0, 'alpine' => 0, 'livewire' => 0, 'bytes' => 5120, 'elements' => 40];

    /** @var list<string> */
    public array $notCovered = [];

    /** @var array<string, string> */
    public array $notCoveredReasons = [];

    /** @var array<string, Measurement> */
    public array $measurements = [];

    /** @var array<'queries'|'alpine'|'livewire'|'bytes'|'elements', int> */
    private array $budget;

    /** @param Closure(int): list<int|string>|null $seed
     * @param  Closure(string): TestResponse<Response>  $request
     * @param  array<'queries'|'alpine'|'livewire'|'bytes'|'elements', mixed>  $budget
     */
    private function __construct(
        private readonly Closure $request,
        private readonly ?Closure $seed = null,
        private readonly string $url = '',
        private readonly string $rows = '[data-page-weight-row]',
        private readonly string $id = 'data-id',
        array $budget = [],
        private readonly bool $swept = false,
    ) {
        if (array_diff_key($budget, self::PER_ITEM) !== []) {
            throw new InvalidArgumentException('LightLists: unknown budget metric.');
        }
        foreach ($budget as $metric => $limit) {
            if (! is_int($limit) || $limit < 0 || $limit > self::PER_ITEM[$metric]) {
                throw new InvalidArgumentException('LightLists budgets may only tighten known defaults.');
            }
        }
        $this->budget = array_replace(self::PER_ITEM, $budget);
    }

    /**
     * Seed returns the exact invented IDs expected in the first response, in any order.
     * It grows to the requested total; seed(0) empties only this test's list.
     *
     * @param  Closure(int): list<int|string>  $seed
     * @param  list<int>  $sizes
     * @param  Closure(string): TestResponse<Response>|null  $request
     * @param  array<'queries'|'alpine'|'livewire'|'bytes'|'elements', int>  $budget
     */
    public static function perItem(Closure $seed, string $url, string $rows, array $sizes = [5, 15], ?Closure $request = null, ?Closure $login = null, ?Closure $fakeAi = null, array $budget = [], string $id = 'data-id'): self
    {
        $request = self::prepare($request, $login, $fakeAi);
        if (count($sizes) !== 2 || $sizes[0] <= 0 || $sizes[1] <= $sizes[0]) {
            throw new InvalidArgumentException('LightLists needs two increasing positive sizes below the list page size.');
        }
        $test = new self($request, $seed, $url, $rows, $id, budget: $budget);
        $smallIds = $seed($sizes[0]);
        $request($url); // Match PageWeight: warm once without checking page budgets.
        $small = $test->measure($url);
        $test->identities($small, $smallIds, $sizes[0]);
        $largeIds = $seed($sizes[1]);
        $large = $test->measure($url);
        $test->identities($large, $largeIds, $sizes[1]);
        $test->delta($small, $large, $url);
        $seed(0);
        $empty = $test->measure($url);
        $test->identities($empty, [], 0);
        Assert::assertLessThanOrEqual(700 * 1024, $empty['bytes'], 'LightLists: fixed empty page exceeds 700 KB.');
        $test->measurements = ['small' => $small, 'large' => $large, 'empty' => $empty];

        return $test;
    }

    /**
     * A separate oversize measurement must show a bounded list and a follow-up control.
     */
    public function bounded(int $limit = 200, string $followUp = '[data-page-weight-next]'): self
    {
        if ($this->seed === null || $limit < 1) {
            throw new InvalidArgumentException('LightLists bounded needs perItem and a positive limit.');
        }
        if ($limit > 200) {
            throw new InvalidArgumentException('LightLists bound may only tighten 200 rows.');
        }
        $ids = ($this->seed)(201);
        Assert::assertCount(201, $ids, 'LightLists bound seed must return 201 IDs.');
        $page = $this->measure($this->url);
        Assert::assertGreaterThan(0, count($page['rows']), 'LightLists: bounded list shows no rows.');
        Assert::assertLessThanOrEqual($limit, count($page['rows']), 'LightLists: unbounded list.');
        Assert::assertSame([], array_values(array_diff($page['rows'], array_map(strval(...), $ids))), 'LightLists: bounded response contains unexpected row IDs.');
        Assert::assertSame(count($page['rows']), count(array_unique($page['rows'])), 'LightLists: bounded response repeats row IDs.');
        Assert::assertNotEmpty($page['html']->select($followUp), 'LightLists: bounded list needs pagination or a load-more control.');
        $this->measurements['bounded'] = $page;
        ($this->seed)(0);

        return $this;
    }

    /**
     * Measure a filter/load-more request at both sizes, including its own empty state.
     * The seed returns the IDs expected after applying the filter.
     *
     * @param  Closure(string): TestResponse<Response>  $request
     * @param  Closure(int): list<int|string>|null  $seed
     * @param  list<int>  $sizes
     */
    public function followUp(Closure $request, ?Closure $seed = null, array $sizes = [5, 15]): self
    {
        $seed ??= $this->seed;
        if ($seed === null) {
            throw new InvalidArgumentException('LightLists followUp needs a seed callback.');
        }
        // The app AI fake installed by prepare remains active; never invoke a real provider.
        $followUp = self::perItem(seed: $seed, url: $this->url, rows: $this->rows, sizes: $sizes, request: $request, fakeAi: fn () => null, budget: $this->budget, id: $this->id);
        foreach ($followUp->measurements as $name => $measurement) {
            $this->measurements['followUp'.ucfirst($name)] = $measurement;
        }

        return $this;
    }

    /**
     * Enumerate all router GET contracts, optionally with additional explicit URLs.
     * Parameterised routes may use a resolver map or callback. Exclusions are path => reason.
     *
     * @param  array<string, list<string>>|Closure(Route): list<string>  $resolve
     * @param  array<string, string>  $main
     * @param  list<string>|null  $routes
     * @param  array<string, string>  $exclude
     * @param  Closure(string): TestResponse<Response>|null  $request
     */
    public static function sweep(?array $routes = null, ?Closure $request = null, array $exclude = [], ?Closure $login = null, ?Closure $fakeAi = null, string $rows = '[data-page-weight-row]', array|Closure $resolve = [], array $main = []): self
    {
        $request = self::prepare($request, $login, $fakeAi);
        foreach ($exclude as $reason) {
            if (trim($reason) === '') {
                throw new InvalidArgumentException('LightLists exclusions need a reason.');
            }
        }
        $test = new self($request, rows: $rows, swept: true);
        $paths = [];
        // Always enumerate the router; an explicit list cannot silently reduce coverage.
        foreach (app('router')->getRoutes()->getRoutes() as $route) {
            if (! in_array('GET', $route->methods(), true)) {
                continue;
            }
            $uri = '/'.ltrim($route->uri(), '/');
            $name = $route->getName() ?? $uri;
            if (isset($exclude[$name]) || isset($exclude[$uri])) {
                continue;
            }
            $resolved = $resolve instanceof Closure ? $resolve($route) : ($resolve[$name] ?? $resolve[$uri] ?? []);
            if (str_contains($uri, '{') || $route->getDomain() !== null) {
                Assert::assertNotEmpty($resolved, "LightLists: unresolved GET route {$name}; resolve parameters/domain or exclude with reason.");
            } else {
                $resolved = [$uri];
            }
            foreach ($resolved as $path) {
                $paths[$path] = $main[$path] ?? $main[$name] ?? $main[$uri] ?? null;
            }
        }
        foreach (array_unique([...array_keys($paths), ...($routes ?? [])]) as $url) {
            if (isset($exclude[$url])) {
                continue;
            }
            $page = $test->measure($url);
            if (! $page['isHtml']) {
                continue;
            }
            $selector = $paths[$url] ?? $main[$url] ?? null;
            if ($selector === null) {
                $test->notCovered[] = $url;
                $test->notCoveredReasons[$url] = 'no main-content selector';
                fwrite(STDERR, "LightLists not covered (no main-content selector): {$url}\n");

                continue;
            }
            Assert::assertTrue($page['html']->assertMain($selector), "LightLists {$url}: main content missing from first response.");
            $test->measurements[$url] = $page;
        }

        return $test;
    }

    /**
     * @param  Closure(int): mixed  $seed
     * @param  list<int>  $sizes
     */
    public function scaled(Closure $seed, array $sizes = [1, 3]): self
    {
        if (! $this->swept) {
            throw new InvalidArgumentException('LightLists scaled is available only after sweep.');
        }
        if (count($sizes) !== 2 || $sizes[1] <= $sizes[0]) {
            throw new InvalidArgumentException('LightLists scaled needs two increasing sizes.');
        }
        $seed($sizes[0]);
        $small = [];
        foreach (array_keys($this->measurements) as $url) {
            ($this->request)($url); // Match PageWeight: warm once without checking page budgets.
            $small[$url] = $this->measure($url);
        }
        $seed($sizes[1]);
        foreach ($small as $url => $before) {
            $after = $this->measure($url);
            Assert::assertLessThanOrEqual($before['queries'], $after['queries'], 'LightLists scaled: queries grew.');
            if (count($after['rows']) !== count($before['rows'])) {
                $this->delta($before, $after, $url);
            }
        }

        return $this;
    }

    /**
     * @param  Closure(string): TestResponse<Response>|null  $request
     * @return Closure(string): TestResponse<Response>
     */
    private static function prepare(?Closure $request, ?Closure $login, ?Closure $fakeAi): Closure
    {
        if ($request === null) {
            throw new InvalidArgumentException('LightLists: provide request: fn ($url) => $this->get($url) from your Feature test.');
        }
        if ($fakeAi === null) {
            throw new InvalidArgumentException('LightLists: provide fakeAi: callback installing your app AI fake (or an explicit no-op if no AI is used).');
        }
        Http::preventStrayRequests();
        Http::fake();
        Mail::fake();
        Notification::fake();
        Queue::fake();
        $fakeAi();
        $login?->__invoke();

        return $request;
    }

    /**
     * @param  Closure(string): TestResponse<Response>|null  $request
     * @return Measurement
     */
    private function measure(string $url, ?Closure $request = null): array
    {
        $store = Cache::getStore();
        if (! $store instanceof ArrayStore) {
            throw new InvalidArgumentException('set CACHE_STORE=array in phpunit.xml for LightLists');
        }
        $store->flush();
        app()->forgetScopedInstances();
        // One temporary listener on each distinct dispatcher, including newly opened connections.
        DB::connection();
        $dispatchers = [self::dispatcher(app('events'))];
        $connectionDispatchers = [];
        foreach (DB::getConnections() as $connection) {
            $original = $connection->getEventDispatcher();
            $connectionDispatchers[] = [$connection, $original];
            $dispatcher = self::dispatcher($original);
            $connection->setEventDispatcher($dispatcher);
            if (! in_array($dispatcher, $dispatchers, true)) {
                $dispatchers[] = $dispatcher;
            }
        }
        $queries = 0;
        $listener = function () use (&$queries): void {
            $queries++;
        };
        try {
            foreach ($dispatchers as $dispatcher) {
                $dispatcher->listen(QueryExecuted::class, $listener);
            }
            $response = ($request ?? $this->request)($url);
        } finally {
            foreach ($connectionDispatchers as [$connection, $original]) {
                if ($original === null) {
                    $connection->unsetEventDispatcher();
                } else {
                    $connection->setEventDispatcher($original);
                }
            }
            foreach ($dispatchers as $dispatcher) {
                $listeners = $dispatcher->getRawListeners()[QueryExecuted::class] ?? [];
                if (! is_array($listeners)) {
                    throw new InvalidArgumentException('LightLists: invalid query listener registry.');
                }
                $dispatcher->forget(QueryExecuted::class);
                // Laravel accepts Class@method strings at runtime but its listen PHPDoc excludes them.
                // Restore raw listeners verbatim, including these strings, without changing their representation.
                $restore = new \ReflectionMethod($dispatcher, 'listen');
                foreach ($listeners as $existing) {
                    if ($existing !== $listener) {
                        $restore->invoke($dispatcher, QueryExecuted::class, $existing);
                    }
                }
            }
        }
        $response->assertStatus(200);
        $content = (string) $response->getContent();
        $isHtml = str_contains((string) $response->headers->get('Content-Type'), 'text/html');
        if (str_contains((string) $response->headers->get('Content-Type'), 'json')) {
            $payload = json_decode($content, true);
            if (is_array($payload) && is_array($payload['components'] ?? null)) {
                $fragments = [];
                foreach ($payload['components'] as $component) {
                    if (is_array($component) && is_array($component['effects'] ?? null) && is_string($component['effects']['html'] ?? null)) {
                        $fragments[] = $component['effects']['html'];
                    }
                }
                $content = implode("\n", $fragments);
                $isHtml = true;
            }
        }
        $html = new LightListsHtml($content);
        $page = ['bytes' => self::markupBytes($html->html), 'elements' => $html->countElements(), 'alpine' => count($html->select('[x-data]')), 'livewire' => count($html->select('[wire:id]')), 'queries' => $queries, 'rows' => array_map(fn (DOMElement $row): string => $row->getAttribute($this->id), $html->select($this->rows)), 'html' => $html, 'isHtml' => $isHtml];
        Assert::assertLessThanOrEqual(100, $queries, "LightLists {$url}: more than 100 queries.");
        Assert::assertLessThanOrEqual(150, $page['alpine'], "LightLists {$url}: more than 150 x-data.");

        return $page;
    }

    /**
     * The weight of the markup, not of its formatting: whitespace between tags is dropped and every other
     * whitespace run becomes one space. Attributes, comments and class names stay counted.
     */
    private static function markupBytes(string $html): int
    {
        $markup = preg_replace('/>\s+</', '><', $html) ?? $html;

        return strlen(preg_replace('/\s+/', ' ', $markup) ?? $markup);
    }

    private static function dispatcher(mixed $dispatcher): Dispatcher
    {
        while ($dispatcher instanceof EventFake) {
            $dispatcher = $dispatcher->dispatcher;
        }
        if (! $dispatcher instanceof Dispatcher) {
            throw new InvalidArgumentException('LightLists requires the Laravel event dispatcher to count queries.');
        }

        return $dispatcher;
    }

    /**
     * @param  Measurement  $page
     * @param  list<int|string>  $ids
     */
    private function identities(array $page, array $ids, int $size): void
    {
        Assert::assertCount($size, $ids, 'LightLists: seed must return exactly the expected fake IDs.');
        Assert::assertCount($size, $page['rows'], 'LightLists: first response row count differs from seed (lazy or truncated list).');
        Assert::assertEqualsCanonicalizing(array_map(strval(...), $ids), $page['rows'], 'LightLists: first response contains unexpected row IDs.');
    }

    /**
     * @param  Measurement  $before
     * @param  Measurement  $after
     */
    private function delta(array $before, array $after, string $url): void
    {
        $rows = count($after['rows']) - count($before['rows']);
        Assert::assertGreaterThan(0, $rows, "LightLists {$url}: row count did not increase.");
        foreach ($this->budget as $metric => $limit) {
            $difference = $after[$metric] - $before[$metric];
            Assert::assertLessThanOrEqual($limit * $rows, $difference, "LightLists {$url}: {$metric} per item exceeds {$limit}.");
        }
        fwrite(STDERR, "LightLists {$url}: +{$rows} rows, ".($after['bytes'] - $before['bytes']).' B, '.($after['queries'] - $before['queries'])." queries\n");
    }
}

/** Server HTML only; template and hidden descendants count too. */
final class LightListsHtml
{
    /** Test marker (no CSS): a part of the page that is not its purpose and may load lazily. */
    public const SECONDARY = 'data-page-weight-secondary';

    private \DOMXPath $xpath;

    public function __construct(public readonly string $html)
    {
        $document = new \DOMDocument;
        $previous = libxml_use_internal_errors(true);
        try {
            $document->loadHTML('<?xml encoding="UTF-8">'.$html, LIBXML_NONET);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }
        $this->xpath = new \DOMXPath($document);
    }

    /** @return list<DOMElement> */
    public function select(string $selector, ?\DOMNode $context = null): array
    {
        $literal = '[a-zA-Z_][a-zA-Z0-9_.:-]*';
        $expression = match (true) {
            preg_match('/^#('.$literal.')$/', $selector, $m) === 1 => '@id="'.$m[1].'"',
            preg_match('/^\.('.$literal.')$/', $selector, $m) === 1 => 'contains(concat(" ", normalize-space(@class), " "), " '.$m[1].' ")',
            preg_match('/^\[('.$literal.')(?:=[\'\"]?([a-zA-Z0-9_.:-]+)[\'\"]?)?\]$/', $selector, $m) === 1 => '@*[name()="'.$m[1].'"'.(isset($m[2]) ? ' and .="'.$m[2].'"' : '').']',
            default => throw new InvalidArgumentException("LightLists needs a simple id, class or attribute selector; got [{$selector}]."),
        };
        $result = $this->xpath->query('.//*['.$expression.']', $context);

        return $result === false ? [] : array_values(array_filter(iterator_to_array($result), fn ($node): bool => $node instanceof DOMElement));
    }

    public function countElements(): int
    {
        $nodes = $this->xpath->query('//*');

        return $nodes === false ? 0 : $nodes->length;
    }

    public function assertMain(string $selector): bool
    {
        $regions = $this->select($selector);
        if ($regions === []) {
            return false;
        }
        foreach ($regions as $region) {
            Assert::assertFalse($region->hasAttribute(self::SECONDARY), 'LightLists: the main region itself cannot be secondary.');
            foreach ($this->select('['.self::SECONDARY.']', $region) as $secondary) {
                Assert::assertNotSame('', trim($secondary->getAttribute(self::SECONDARY)), 'LightLists: '.self::SECONDARY.' needs a reason.');
            }
            $text = '';
            $nodes = $this->xpath->query('.//text()', $region);
            foreach ($nodes === false ? [] : $nodes as $node) {
                if ($node instanceof \DOMNode && ! $this->insideSecondary($node, $region) && ! $this->insideInert($node)) {
                    $text .= $node->textContent;
                }
            }
            // Non-breaking and zero-width spaces are no content either.
            Assert::assertMatchesRegularExpression('/[^\s\p{Z}\p{Cc}\p{Cf}]/u', $text, 'LightLists: main content is empty in the first response.');
            foreach ([$region, ...$this->select('[wire:snapshot]', $region)] as $element) {
                if ($this->insideSecondary($element, $region)) {
                    continue;
                }
                $snapshot = json_decode($element->getAttribute('wire:snapshot'), true);
                Assert::assertFalse(is_array($snapshot) && is_array($snapshot['memo'] ?? null) && ($snapshot['memo']['lazyLoaded'] ?? null) === false, 'LightLists: lazy/defer main placeholder in the first response.');
            }
            // Livewire 4 SupportLazyLoading emits __lazyLoad in x-init (defer) or x-intersect (lazy).
            foreach ([$region, ...iterator_to_array($region->getElementsByTagName('*'))] as $element) {
                if ($this->insideSecondary($element, $region)) {
                    continue;
                }
                foreach ($element->attributes as $attribute) {
                    if (preg_match('/^x-(?:init|intersect)(?:\\.|$)/', $attribute->name)) {
                        Assert::assertStringNotContainsString('__lazyLoad', $attribute->value, 'LightLists: lazy/defer main placeholder.');
                    }
                }
            }
        }

        return true;
    }

    /** True when the node is, or sits inside, an element marked secondary below the region. */
    private function insideSecondary(\DOMNode $node, DOMElement $region): bool
    {
        for ($current = $node; $current !== null && ! $current->isSameNode($region); $current = $current->parentNode) {
            if ($current instanceof DOMElement && $current->hasAttribute(self::SECONDARY)) {
                return true;
            }
        }

        return false;
    }

    /** True when the node, or the main region around it, sits inside script, style, template or noscript: that text is no content. */
    private function insideInert(\DOMNode $node): bool
    {
        for ($current = $node; $current !== null; $current = $current->parentNode) {
            if ($current instanceof DOMElement && in_array(strtolower($current->tagName), ['script', 'style', 'template', 'noscript'], true)) {
                return true;
            }
        }

        return false;
    }
}
