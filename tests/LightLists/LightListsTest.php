<?php

// light-lists v1.0.1 — copied from uteq/agent-skills ux-schermontwerp/references/lichte-lijsten

declare(strict_types=1);

namespace Tests\LightLists;

use Illuminate\Routing\Route;
use Illuminate\View\Compilers\ComponentTagCompiler;
use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;
use Tests\TestCase;

require_once __DIR__.'/LightLists.php';

/** No database trait here: the host chooses RefreshDatabase or transactions. */
abstract class LightListsTest extends TestCase
{
    abstract protected function loginForLightLists(): void;

    abstract protected function fakeAiForLightLists(): void;

    /** @return list<array{url: string, rows: string, seed: \Closure(int): list<int|string>, sizes?: list<int>, budget?: array<'queries'|'alpine'|'livewire'|'bytes'|'elements', int>, id?: string, next?: string}> */
    abstract protected function lightLists(): array;

    /** @return array<string, list<string>> */
    protected function routeParameters(): array
    {
        return [];
    }

    /** @return array<string, string> */
    protected function routeExclusions(): array
    {
        return [];
    }

    /** @return array<string, string> */
    protected function mainSelectors(): array
    {
        return [];
    }

    /** @return list<string> */
    protected function scanPaths(): array
    {
        return [base_path('resources/views'), app_path()];
    }

    protected function baselineBase(): string
    {
        $override = getenv('LIGHT_LISTS_BASE');
        if ($override) {
            return $override;
        }
        $branch = getenv('GITHUB_BASE_REF');

        return $branch ? 'origin/'.$branch : 'origin/main';
    }

    public function test_light_lists_static_scan(): void
    {
        $hits = LightListsScan::paths($this->scanPaths(), base_path());
        foreach ($this->routeExclusions() as $reason) {
            Assert::assertNotSame('', trim($reason));
        }
        $path = base_path('tests/light-lists-baseline.php');
        /** @var array<string, array{count: int, reason: string}> $baseline */
        $baseline = is_file($path) ? require $path : [];
        $base = LightListsScan::baseBaseline(base_path(), $this->baselineBase());
        LightListsScan::assertBaseline($hits, $baseline, $base);
    }

    public function test_light_lists_per_item_and_bound(): void
    {
        Assert::assertNotEmpty($this->lightLists(), 'Declare the main lists to measure.');
        foreach ($this->lightLists() as $list) {
            LightLists::perItem(seed: $list['seed'], url: $list['url'], rows: $list['rows'],
                login: fn () => $this->loginForLightLists(), sizes: $list['sizes'] ?? [5, 15], request: fn ($url) => $this->get($url),
                fakeAi: fn () => $this->fakeAiForLightLists(), budget: $list['budget'] ?? [], id: $list['id'] ?? 'data-id')
                ->bounded(followUp: $list['next'] ?? '[data-page-weight-next]');
        }
    }

    public function test_light_lists_get_sweep(): void
    {
        // Lazy and once: routeParameters() may create fixtures, and those must run after the sweep installed its fakes.
        $parameters = null;
        /** @var \Closure(Route): list<string> $resolve */
        $resolve = function (Route $route) use (&$parameters): array {
            $parameters ??= $this->routeParameters();

            return $parameters[$route->getName() ?? ''] ?? $parameters['/'.ltrim($route->uri(), '/')] ?? [];
        };
        $weight = LightLists::sweep(request: fn ($url) => $this->get($url),
            login: fn () => $this->loginForLightLists(), fakeAi: fn () => $this->fakeAiForLightLists(),
            resolve: $resolve, exclude: $this->routeExclusions(), main: $this->mainSelectors());
        Assert::assertSame([], $weight->notCovered, 'GET pages not covered: '.implode(', ', $weight->notCovered));
    }

    public function test_light_lists_secondary_part_may_load_lazily(): void
    {
        $lazy = "<div wire:snapshot='{\"memo\":{\"lazyLoaded\":false}}'></div><div x-intersect=\"\$wire.__lazyLoad('x')\"></div><div x-init=\"\$wire.__lazyLoad('y')\"></div>";
        $main = fn (string $inner) => new LightListsHtml('<main data-main>'.$inner.'</main>');

        Assert::assertTrue($main('<p>Orders</p><aside data-page-weight-secondary="settings panel"><span>Waiting</span>'.$lazy.'</aside>')->assertMain('[data-main]'));
        $this->assertMainFails($main('<p>Orders</p>'.$lazy), 'placeholder');
        $this->assertMainFails($main('<p>Orders</p><aside data-page-weight-secondary="panel"></aside><div x-init="$wire.__lazyLoad(\'y\')"></div>'), 'placeholder');
    }

    public function test_light_lists_secondary_part_needs_a_reason_and_main_text(): void
    {
        $main = fn (string $inner, string $attributes = '') => new LightListsHtml('<main data-main'.$attributes.'>'.$inner.'</main>');

        $this->assertMainFails($main('<p>Orders</p><aside data-page-weight-secondary="">Panel</aside>'), 'needs a reason');
        $this->assertMainFails($main("<p>Orders</p><aside data-page-weight-secondary=\"  \n \">Panel</aside>"), 'needs a reason');
        $this->assertMainFails($main('<p>Orders</p>', ' data-page-weight-secondary="all of it"'), 'cannot be secondary');
        $this->assertMainFails($main('<div data-page-weight-secondary="everything"><p>Orders</p></div>  '), 'main content is empty');
        Assert::assertTrue($main('<div data-page-weight-secondary="a"><p>One</p></div><p>Main</p>')->assertMain('[data-main]'));
    }

    public function test_light_lists_inert_text_is_no_main_content(): void
    {
        $main = fn (string $inner) => new LightListsHtml('<main data-main>'.$inner.'</main>');
        $secondary = '<div data-page-weight-secondary="everything"><p>Orders</p></div>';

        foreach (['<script>0</script>', '<style>.a{}</style>', '<template><p>Orders</p></template>', '<noscript>Orders</noscript>'] as $inert) {
            $this->assertMainFails($main($inert.$secondary), 'main content is empty');
            Assert::assertTrue($main($inert.'<p>Main</p>')->assertMain('[data-main]'));
        }
    }

    public function test_light_lists_blank_unicode_space_and_inert_main_regions_are_no_main_content(): void
    {
        $secondary = '<div data-page-weight-secondary="everything"><p>Orders</p></div>';

        foreach (['<main data-main>&nbsp;'.$secondary.'</main>', "<main data-main>\u{200B}".$secondary.'</main>', '<template><main data-main><p>Orders</p></main></template>', '<noscript><main data-main><p>Orders</p></main></noscript>'] as $html) {
            $this->assertMainFails(new LightListsHtml($html), 'main content is empty');
        }
    }

    private function assertMainFails(LightListsHtml $html, string $message): void
    {
        try {
            $html->assertMain('[data-main]');
        } catch (AssertionFailedError $e) {
            Assert::assertStringContainsString($message, $e->getMessage());

            return;
        }
        Assert::fail('Expected the main check to fail with: '.$message);
    }
}

/** One-level Blade scan; never renders an application view. */
final class LightListsScan
{
    /** Database-free entry point; keys are repo-relative file|rule.
     * @param  list<string>  $paths
     * @return array<string, int>
     */
    public static function paths(array $paths, string $root): array
    {
        $counts = [];
        $root = realpath($root) ?: $root;
        foreach ($paths as $path) {
            $files = is_dir($path) ? new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS)) : [$path];
            /** @var \SplFileInfo|string $file */
            foreach ($files as $file) {
                $file = realpath((string) $file) ?: (string) $file;
                $relative = ltrim(substr($file, strlen(rtrim($root, '/'))), '/');
                if (str_ends_with($file, '.blade.php')) {
                    foreach (self::scan($file) as $hit) {
                        $key = $relative.'|'.$hit['rule'];
                        $counts[$key] = ($counts[$key] ?? 0) + 1;
                    }
                } elseif (str_ends_with($file, '.php')) {
                    // Strip PHP comments, keeping only code tokens for this conservative signal.
                    $code = '';
                    foreach (token_get_all((string) file_get_contents($file)) as $token) {
                        $code .= is_array($token) ? (in_array($token[0], [T_COMMENT, T_DOC_COMMENT], true) ? '' : $token[1]) : $token;
                    }
                    if (! str_contains($code, 'Filament\\')) {
                        continue;
                    }
                    // Record-bound callbacks in columns, actions or forms. Deliberately a signal,
                    // not a claim that Filament itself mounts a separate modal per record.
                    foreach (self::recordCallbacks($code) as $callback) {
                        foreach (['filament-record-query' => '/(?:::|->)(?:query|find|findOrFail|where|count|exists|get|first|pluck)\s*\(/',
                            'filament-record-modal' => '/(?:->modal\w*\s*\(|new\s+\w*Modal\b)/'] as $rule => $pattern) {
                            if (preg_match($pattern, $callback)) {
                                $key = $relative.'|'.$rule;
                                $counts[$key] = ($counts[$key] ?? 0) + 1;
                            }
                        }
                    }
                }
            }
        }
        ksort($counts);

        return $counts;
    }

    /** Extract only record callback bodies; adjacent fluent calls are outside the body.
     * @return list<string>
     */
    private static function recordCallbacks(string $code): array
    {
        $tokens = token_get_all($code);
        $bodies = [];
        $length = count($tokens);
        /** @param array{int, string, int}|string $token */
        $text = static function (array|string $token): string {
            /** @var array{int, string, int}|string $token */
            return is_array($token) ? $token[1] : $token;
        };
        for ($i = 0; $i < $length; $i++) {
            if (! is_array($tokens[$i]) || ! in_array($tokens[$i][0], [T_FN, T_FUNCTION], true)) {
                continue;
            }
            $arrow = $tokens[$i][0] === T_FN;
            $j = $i + 1;
            while ($j < $length && $text($tokens[$j]) !== '(') {
                // Named functions/methods are not record callbacks.
                if (is_array($tokens[$j]) && $tokens[$j][0] === T_STRING) {
                    break;
                }
                $j++;
            }
            if ($j === $length || $text($tokens[$j]) !== '(') {
                continue;
            }
            $depth = 1;
            $record = false;
            while (++$j < $length && $depth > 0) {
                $token = $tokens[$j];
                $value = $text($token);
                if ($value === '(') {
                    $depth++;
                }
                if ($value === ')') {
                    $depth--;
                }
                if (is_array($token) && $token[0] === T_VARIABLE && $value === '$record') {
                    $record = true;
                }
            }
            if (! $record) {
                continue;
            }
            // Skip return types and a closure's use(...) declaration.
            while ($j < $length && ! ($arrow ? (is_array($tokens[$j]) && $tokens[$j][0] === T_DOUBLE_ARROW) : $text($tokens[$j]) === '{')) {
                $j++;
            }
            if ($j === $length) {
                continue;
            }
            $body = '';
            $depth = $arrow ? 0 : 1;
            for ($j++; $j < $length; $j++) {
                $token = $tokens[$j];
                $value = $text($token);
                if ($arrow && $depth === 0 && in_array($value, [',', ')', ']', ';'], true)) {
                    break;
                }
                // String tokens are atomic; interpolated strings have explicit opening tokens.
                if ((! is_array($token) && in_array($value, ['(', '[', '{'], true))
                    || (is_array($token) && in_array($token[0], [T_CURLY_OPEN, T_DOLLAR_OPEN_CURLY_BRACES], true))) {
                    $depth++;
                }
                if (! is_array($token) && in_array($value, [')', ']', '}'], true)) {
                    $depth--;
                    if (! $arrow && $depth === 0) {
                        break;
                    }
                }
                $body .= $value;
            }
            $bodies[] = $body;
        }

        return $bodies;
    }

    /** @return array<string, array{count: int, reason: string}>|null */
    public static function baseBaseline(string $root, string $base): ?array
    {
        if ($base === '' || str_starts_with($base, '-') || ! preg_match('~^[a-zA-Z0-9_./-]+$~', $base)) {
            throw new InvalidArgumentException('Invalid baseline base ref.');
        }
        /** @param list<string> $args */
        $run = static function (array $args) use ($root): array {
            /** @var list<string> $args */
            $process = proc_open($args, [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, $root);
            if (! is_resource($process)) {
                throw new InvalidArgumentException('Cannot start git.');
            }
            $out = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            $err = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            return [proc_close($process), $out, $err];
        };
        [$status] = $run(['git', 'rev-parse', '--verify', $base.'^{commit}']);
        Assert::assertSame(0, $status, 'Fetch the baseline base ref: '.$base);
        [$status, $source] = $run(['git', 'show', $base.':tests/light-lists-baseline.php']);
        if ($status !== 0) {
            [$listed, $files] = $run(['git', 'ls-tree', '--name-only', $base, '--', 'tests/light-lists-baseline.php']);
            Assert::assertSame(0, $listed, 'Cannot inspect the baseline base tree.');
            Assert::assertSame('', trim($files), 'Base baseline exists but git show failed.');

            return null; // No baseline on base: first adoption in this PR.
        }
        // Like require of the working baseline, this executes trusted repository PHP only.
        Assert::assertStringStartsWith('<?php', $source, 'Baseline must be a PHP array file.');
        $value = eval(substr($source, 5));
        Assert::assertIsArray($value);

        /** @var array<string, array{count: int, reason: string}> $value */
        return $value;
    }

    /** @param array<string, int> $hits
     * @param  array<string, array{count: int, reason: string}>  $baseline
     * @param  array<string, array{count: int, reason: string}>|null  $base
     */
    public static function assertBaseline(array $hits, array $baseline, ?array $base): void
    {
        if ($base === null) {
            fwrite(STDERR, "LightLists: introducing the initial baseline.\n");
            $base = $baseline;
        }
        self::validateBaseline($baseline);
        self::validateBaseline($base);
        foreach ($baseline as $key => $entry) {
            Assert::assertArrayHasKey($key, $base, 'New baseline entry: '.$key);
            Assert::assertLessThanOrEqual($base[$key]['count'], $entry['count'], 'Higher baseline count: '.$key);
            Assert::assertArrayHasKey($key, $hits, 'Stale baseline entry: '.$key);
            Assert::assertSame($hits[$key], $entry['count'], 'Baseline count must match current hits: '.$key);
        }
        foreach ($hits as $key => $count) {
            Assert::assertArrayHasKey($key, $baseline, 'New unbaselined hit: '.$key);
            Assert::assertSame($baseline[$key]['count'], $count, 'Changed hit count: '.$key);
        }
    }

    /** @param array<mixed> $entries */
    private static function validateBaseline(array $entries): void
    {
        foreach ($entries as $key => $entry) {
            Assert::assertIsString($key);
            Assert::assertIsArray($entry);
            Assert::assertIsInt($entry['count'] ?? null, 'Baseline needs an integer count: '.$key);
            Assert::assertGreaterThan(0, $entry['count']);
            Assert::assertIsString($entry['reason'] ?? null);
            Assert::assertNotSame('', trim($entry['reason']), 'Baseline needs a reason: '.$key);
        }
    }

    /** @return list<array{file: string, line: int, rule: string, fragment: string, target: string|null}> */
    public static function scan(string $file): array
    {
        $source = (string) file_get_contents($file);
        $content = (string) preg_replace_callback('/{{--.*?--}}|<!--.*?-->/s', fn (array $m): string => preg_replace('/[^\n]/', ' ', $m[0]) ?? '', $source);
        $lines = explode("\n", $source);
        preg_match_all('/(?<![\w@])@(endforeach|endforelse|endfor|endwhile|empty(?!\s*\()|foreach|forelse|for|while)\b|(?<![\w@])@(include(?:Unless|When|First|If)?|each)\s*\(|<\/?x-[\w:.\-]+\b(?:[^>\'"]|\'[^\']*\'|"[^"]*")*>|<flux:[\w:.\-]+\b(?:[^>\'"]|\'[^\']*\'|"[^"]*")*>|<livewire:[\w:.\-]+\b(?:[^>\'"]|\'[^\']*\'|"[^"]*")*>|(?<![\w@])@livewire\s*\(/s', $content, $tokens, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        /** @var list<array{line: int, kind: string, allowed: bool}> $loops */
        $loops = [];
        $hits = [];
        foreach ($tokens as $token) {
            [$text, $offset] = $token[0];
            $line = substr_count(substr($content, 0, $offset), "\n") + 1;
            $directive = $token[1][0] ?? '';
            if ($directive === 'empty' && ($loops !== []) && $loops[count($loops) - 1]['kind'] === 'forelse') {
                $loops[count($loops) - 1]['allowed'] = true;

                continue;
            }
            if (str_starts_with($directive, 'end')) {
                array_pop($loops);

                continue;
            }
            if (in_array($directive, ['foreach', 'forelse', 'for', 'while'], true)) {
                $loops[] = ['line' => $line, 'kind' => $directive, 'allowed' => self::allowed($lines, $line)];

                continue;
            }
            $each = ($token[2][0] ?? '') === 'each';
            $allAllowed = ! in_array(false, array_column($loops, 'allowed'), true);
            if ($each ? ($allAllowed && self::allowed($lines, $line)) : ($loops === [] || $allAllowed)) {
                continue;
            }
            $targets = [null];
            if (($token[2][0] ?? '') !== '') {
                $args = self::arguments(substr($content, $offset + strlen($text)));
                $kind = $token[2][0];
                $expression = $args[in_array($kind, ['includeWhen', 'includeUnless'], true) ? 1 : 0] ?? '';
                $names = [];
                if ($kind === 'includeFirst' && str_starts_with(trim($expression), '[')) {
                    preg_match_all('/[\'"]([^\'"]+)[\'"]/', $expression, $matches);
                    $names = $matches[1];
                } elseif (preg_match('/^[\'"]([^\'"]+)[\'"]$/', trim($expression), $match) === 1) {
                    $names = [$match[1]];
                }
                $targets = array_map(fn (string $name): ?string => self::target($name, ''), $names);
            } elseif (str_starts_with($text, '<x-') && ! self::heavy($text)) {
                $targets = [self::target(null, $text)];
            }
            foreach ($targets as $target) {
                $heavy = self::heavy($text);
                if ($target !== null) {
                    $included = (string) file_get_contents($target);
                    $included = (string) preg_replace('/{{--.*?--}}|<!--.*?-->/s', '', $included);
                    $heavy = self::heavy($included);
                }
                if ($heavy) {
                    $loopLine = $loops === [] ? $line : $loops[0]['line'];
                    $hits[] = ['file' => $file, 'line' => $loopLine, 'rule' => 'heavy-in-loop', 'fragment' => trim($lines[$line - 1] ?? ''), 'target' => $target];
                }
            }
        }

        return $hits;
    }

    /** @param list<string> $lines */
    private static function allowed(array $lines, int $line): bool
    {
        $marker = '/{{--\s*mortel-guard:\s*heavy-in-loop\s+[^\s].*?--}}/';
        $previous = trim($lines[$line - 2] ?? '');

        return preg_match($marker, $lines[$line - 1] ?? '') === 1
            || (preg_match($marker, $previous, $match) === 1 && $match[0] === $previous);
    }

    /** Split directive arguments without confusing commas inside expressions with argument boundaries.
     * @return list<string>
     */
    private static function arguments(string $tail): array
    {
        $args = [];
        $start = 0;
        $depth = 0;
        $quote = null;
        for ($i = 0, $length = strlen($tail); $i < $length; $i++) {
            $char = $tail[$i];
            if ($quote !== null) {
                if ($char === '\\') {
                    $i++;
                } elseif ($char === $quote) {
                    $quote = null;
                }

                continue;
            }
            if ($char === "'" || $char === '"') {
                $quote = $char;
            } elseif ($char === ')' && $depth === 0) {
                $args[] = trim(substr($tail, $start, $i - $start));
                break;
            } elseif (str_contains('([{', $char)) {
                $depth++;
            } elseif (str_contains(')]}', $char)) {
                $depth--;
            } elseif ($char === ',' && $depth === 0) {
                $args[] = trim(substr($tail, $start, $i - $start));
                $start = $i + 1;
            }
        }

        return $args;
    }

    private static function attribute(string $tag, string $name): bool
    {
        // Values may contain arrows, spaces or attribute-like text; only attribute names count.
        $attributes = (string) preg_replace('/\'[^\']*\'|"[^"]*"/s', '""', $tag);

        return preg_match('/\s:?'.preg_quote($name, '/').'(?=\s|=|\/?>)/', $attributes) === 1;
    }

    private static function heavy(string $text): bool
    {
        if (preg_match('/<livewire:[\w:.\-]+\b|(?<![\w@])@livewire\s*\(/s', $text) === 1) {
            return true;
        }
        preg_match_all('/<(x-|flux:)([\w:.\-]+)\b(?:[^>\'\"]|\'[^\']*\'|"[^"]*")*>/s', $text, $tags, PREG_SET_ORDER);
        foreach ($tags as $tag) {
            // Namespaced, dotted and kit-prefixed names share the final block name.
            if (preg_match('/(?:^|::|[.\-])(?:dropdown|modal|popover|context|command|autocomplete|date-picker|collapsible|accordion(?:\.item)?)$/', $tag[2])) {
                return true;
            }
            $select = preg_match('/(?:^|::|[.\-])select$/', $tag[2]);
            if ($select && (self::attribute($tag[0], 'searchable')
                || ($tag[1] === 'flux:' && preg_match('/\svariant\s*=\s*([\'\"])(?:listbox|combobox)\1/', $tag[0])))) {
                return true;
            }
        }

        return false;
    }

    private static function target(?string $view, string $tag): ?string
    {
        if (! function_exists('app') || ! app()->bound('view')) {
            return null;
        }
        try {
            if ($view === null) {
                preg_match('/<x-([\w:.\-]+)/', $tag, $name);
                $blade = app('blade.compiler');
                $compiler = new ComponentTagCompiler($blade->getClassComponentAliases(), $blade->getClassComponentNamespaces(), $blade);
                $view = $compiler->componentClass($name[1] ?? '');
                if (class_exists($view)) {
                    $reflection = new \ReflectionClass($view);
                    if (! $reflection->hasMethod('render')) {
                        return null;
                    }
                    $method = $reflection->getMethod('render');
                    $path = $method->getFileName();
                    if ($path === false) {
                        return null;
                    }
                    $body = implode('', array_slice(file($path) ?: [], $method->getStartLine() - 1, $method->getEndLine() - $method->getStartLine() + 1));
                    if (preg_match('/\bview\s*\(\s*[\'"]([^\'"]+)[\'"]/', $body, $match) !== 1) {
                        return null;
                    }
                    $view = $match[1];
                }
            }

            return app('view')->getFinder()->find($view);
        } catch (\Throwable) {
            // Dynamic names and components returning dynamic views are outside static resolution.
            return null;
        }
    }
}
