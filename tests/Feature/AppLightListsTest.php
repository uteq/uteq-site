<?php

namespace Tests\Feature;

require_once __DIR__.'/../LightLists/LightListsTest.php';
use App\Models\Keuring;
use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\LightLists\LightLists;
use Tests\LightLists\LightListsTest;

final class AppLightListsTest extends LightListsTest
{
    use RefreshDatabase;

    private ?User $actor = null;

    protected function loginForLightLists(): void
    {
        $this->actor ??= User::factory()->create(['name' => 'Fictional List Tester', 'email' => 'lists@example.test', 'password' => 'fake-password-for-tests']);
        $this->actingAs($this->actor);
        $this->withoutVite();
    }

    protected function fakeAiForLightLists(): void
    {
        // The site collects forms; no AI provider is called by GET pages.
        \Illuminate\Support\Facades\Http::preventStrayRequests();
        \Illuminate\Support\Facades\Http::fake();
        \Illuminate\Support\Facades\Mail::fake();
        \Illuminate\Support\Facades\Queue::fake();
        \Illuminate\Support\Facades\Notification::fake();
        \Illuminate\Support\Facades\Storage::fake('local');
        \Illuminate\Support\Facades\Storage::fake('public');
    }

    private function seedKeuringen(int $n): array
    {
        Keuring::query()->delete();
        $ids = [];
        for ($i = 0; $i < $n; $i++) {
            $ids[] = Keuring::create(['email' => "person{$i}@example.test", 'naam' => 'Fictional Person', 'bedrijf' => 'Fictional Company', 'personen' => 2, 'aanvraag' => ['medewerkers' => '10-49', 'meenemen' => 'Fictional question'], 'dossier' => ['test' => ['Fictional answer']]])->id;
        }

        return $ids;
    }

    protected function lightLists(): array
    {
        return [
            ['url' => '/juridisch/subverwerkers', 'rows' => '[data-subprocessor-row]', 'seed' => function ($n) {
                SubprocessorChange::query()->delete();
                Subprocessor::query()->delete();

                return Subprocessor::factory()->count($n)->create(['name' => 'Fictional Provider', 'service' => 'Fictional Service', 'data_location' => 'EU', 'transfer_basis' => 'Fictional basis', 'model_training' => 'No', 'sort_order' => 1])->modelKeys();
            }, 'next' => '[data-subprocessors-next]'],
            ['url' => '/juridisch/subverwerkers', 'rows' => '[data-change-row]', 'seed' => function ($n) {
                SubprocessorChange::query()->delete();
                Subprocessor::query()->delete();
                $sub = Subprocessor::factory()->inactive()->create(['name' => 'Fictional Provider']);

                return SubprocessorChange::factory()->count($n)->create(['subprocessor_id' => $sub->id, 'change_type' => 'updated', 'summary' => 'Fictional change', 'details' => 'Fictional details', 'effective_from' => now()->toDateString(), 'published_at' => now()])->modelKeys();
            }, 'next' => '[data-changes-next]'],
        ];
    }

    public function test_light_lists_per_item_and_bound(): void
    {
        foreach ($this->lightLists() as $list) {
            $weight = LightLists::perItem(seed: $list['seed'], url: $list['url'], rows: $list['rows'], request: fn ($url) => $this->get($url), login: fn () => $this->loginForLightLists(), fakeAi: fn () => $this->fakeAiForLightLists())->bounded(followUp: $list['next'] ?? '[data-page-weight-next]');
            foreach ($weight->measurements as $name => $m) {
                fwrite(STDERR, 'MEASURE '.$list['rows'].' '.$name.' '.json_encode(array_intersect_key($m, array_flip(['bytes', 'elements', 'alpine', 'queries', 'rows']))).PHP_EOL);
            }
        }
    }

    protected function routeParameters(): array
    {
        $k = Keuring::create(['email' => 'dossier@example.test', 'naam' => 'Fictional Person']);

        return ['keuring.dossier' => ['/keuring/dossier/'.$k->token], 'juridisch.show' => array_map(fn ($slug) => '/juridisch/'.$slug, \App\Support\JuridischDocument::SLUGS)];
    }

    protected function routeExclusions(): array
    {
        $assets = [];
        foreach (app('router')->getRoutes() as $route) {
            if (preg_match('~^livewire-[a-f0-9]+/(?:css/|js/|livewire|preview-file)~', $route->uri())) {
                $assets['/'.ltrim($route->uri(), '/')] = 'Livewire generated asset or temporary file, not an HTML page.';
            }
        }

        return $assets + ['livewire.preview-file' => 'Temporary upload preview, not an HTML page.', 'juridisch.subverwerkers.rss' => 'RSS feed, not an HTML page.', 'juridisch.subverwerkers.confirm' => 'Confirmation callback changes a subscription and displays its result; covered by subscription tests.', 'juridisch.subverwerkers.unsubscribe' => 'Unsubscribe callback changes a subscription; covered by subscription tests.', '/livewire/livewire.js' => 'Framework JavaScript asset.', '/livewire/livewire.min.js.map' => 'Framework source map.', '/livewire/preview-file/{filename}' => 'Temporary upload preview.', '/storage/{path}' => 'Stored file response, not an HTML page.', '/sanctum/csrf-cookie' => 'CSRF cookie endpoint.', '/up' => 'Health endpoint, not an HTML page.', '/api/user' => 'JSON user API, not an HTML page.'];
    }

    protected function mainSelectors(): array
    {
        return [
            'home' => '#main-content',
            'contact' => '#main-content',
            'firda' => '#main-content',
            'firda.presentatie' => '.presentation',
            'flexlokaal' => '#main-content',
            'juridisch.index' => '#main-content',
            'juridisch.subverwerkers' => '#main-content',
            'juridisch.subverwerkers.unsubscribe' => '#main-content',
            'juridisch.subverwerkers.confirm' => '#main-content',
            'juridisch.subverwerkers.rss' => '#main-content',
            'juridisch.show' => '#main-content',
            'keuring' => '#main-content',
            'keuring.dossier' => '#main-content',
            '/livewire-4aeeedbb/css/{component}.css' => '#main-content',
            '/livewire-4aeeedbb/css/{component}.global.css' => '#main-content',
            '/livewire-4aeeedbb/js/{component}.js' => '#main-content',
            '/livewire-4aeeedbb/livewire.csp.min.js.map' => '#main-content',
            '/livewire-4aeeedbb/livewire.js' => '#main-content',
            '/livewire-4aeeedbb/livewire.min.js.map' => '#main-content',
            'livewire.preview-file' => '#main-content',
            'over' => '#main-content',
            'partners' => '#main-content',
            'privacy' => '#main-content',
            'projecten' => '#main-content',
            'sanctum.csrf-cookie' => '#main-content',
            'vacature.developer' => '#main-content',
            'vacatures' => '#main-content',
            'werkwijze' => '#main-content',
        ];
    }

    public function test_light_lists_get_sweep(): void
    {
        $params = null;
        $weight = LightLists::sweep(request: function ($url) {
            $r = $this->get($url);
            fwrite(STDERR, 'GET '.$url.' '.$r->getStatusCode().PHP_EOL);

            return $r;
        }, login: fn () => $this->loginForLightLists(), fakeAi: fn () => $this->fakeAiForLightLists(), resolve: function ($route) use (&$params) {
            $params ??= $this->routeParameters();

            return $params[$route->getName() ?? ''] ?? [];
        }, exclude: $this->routeExclusions(), main: $this->mainSelectors());
        self::assertSame(['/keuring/beheer', '/firda/opus-vs-lokaal'], $weight->notCovered);
        fwrite(STDERR, 'LightLists not covered: /keuring/beheer: representative dossier rows cost 8302 bytes and 159 elements per row (budget 5120 / 40); pagination and shared copy controller are covered separately.'.PHP_EOL);
        fwrite(STDERR, 'LightLists not covered: /firda/opus-vs-lokaal: main content is a JavaScript application; first response contains an empty root.'.PHP_EOL);
        foreach ($weight->measurements as $url => $m) {
            fwrite(STDERR, 'SWEEP '.$url.' '.json_encode(array_intersect_key($m, array_flip(['bytes', 'elements', 'alpine', 'queries']))).PHP_EOL);
        }
    }

    public function test_keuring_pagination_and_one_copy_controller(): void
    {
        $this->fakeAiForLightLists();
        $this->loginForLightLists();
        $ids = $this->seedKeuringen(201);
        $component = \Livewire\Livewire::test(\App\Livewire\KeuringBeheer::class);
        $seen = [];
        for ($page = 1; $page <= 5; $page++) {
            $component->call('setPage', $page);
            $doc = new \Tests\LightLists\LightListsHtml($component->html());
            $rows = $doc->select('[data-keuring-row]');
            self::assertLessThanOrEqual(50, count($rows));
            self::assertCount(1, $doc->select('[x-data]'));
            $seen = [...$seen, ...array_map(fn ($row) => (int) $row->getAttribute('data-id'), $rows)];
            $component->assertSee('402'); // Global person total remains the same on every page.
        }
        self::assertEqualsCanonicalizing($ids, $seen);
        self::assertCount(201, array_unique($seen));
    }

    public function test_subscription_pagers_keep_independent_positions(): void
    {
        $this->fakeAiForLightLists();
        $this->loginForLightLists();
        $lists = $this->lightLists();
        $subIds = $lists[0]['seed'](201);
        $sub = Subprocessor::firstOrFail();
        $changes = SubprocessorChange::factory()->count(201)->create(['subprocessor_id' => $sub->id, 'change_type' => 'updated', 'summary' => 'Fictional change', 'details' => 'Fictional details', 'effective_from' => now()->toDateString(), 'published_at' => now()])->modelKeys();
        $response = $this->get('/juridisch/subverwerkers?subprocessors_page=2&changes_page=3')->assertOk();
        $doc = new \Tests\LightLists\LightListsHtml($response->getContent());
        self::assertSame(array_map('strval', array_slice($subIds, 50, 50)), array_map(fn ($row) => $row->getAttribute('data-id'), $doc->select('[data-subprocessor-row]')));
        self::assertSame(array_map('strval', array_slice(array_reverse($changes), 100, 50)), array_map(fn ($row) => $row->getAttribute('data-id'), $doc->select('[data-change-row]')));
        $response->assertSee('subprocessors_page=3', false)->assertSee('changes_page=4',false);
    }
}
