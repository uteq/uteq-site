<?php

namespace Tests\LightLists;

use Illuminate\Http\Request as HttpRequest;
use PHPUnit\Framework\Assert;

/** Keep the hard growth/bound rules even when a page has documented HTML debt. */
trait GuardsListGrowth
{
    private array $listMeasurements = [];

    private function measureGrowthPage(string $url, array $list): array
    {
        $target = app('router')->getRoutes()->match(HttpRequest::create($url));
        $key = $target->getName() ?? '/'.ltrim($target->uri(), '/');
        $exclude = [];
        foreach (app('router')->getRoutes() as $route) {
            if ($route !== $target && in_array('GET', $route->methods(), true)) {
                $exclude[$route->getName() ?? '/'.ltrim($route->uri(), '/')] = 'Measured independently in the complete GET sweep.';
            }
        }
        // sweep uses the pinned contract's SQL listener, HTML helper and byte normalisation.
        $weight = LightLists::sweep(request: fn ($path) => $this->get($path),
            fakeAi: fn () => null, exclude: $exclude, resolve: [$key => [$url]],
            main: [$key => $list['main']], rows: $list['rows'] ?? '.fi-ta-row');
        $m = $weight->measurements[$url];
        $rows = $m['html']->select($list['rows'] ?? '.fi-ta-row');
        $m['ids'] = [];
        $m['rowAlpine'] = 0;
        foreach ($rows as $row) {
            $id = $row->getAttribute($list['id'] ?? 'wire:key');
            $m['ids'][] = ($list['id'] ?? 'wire:key') === 'wire:key' ? substr($id, strrpos($id, '.') + 1) : $id;
            $m['rowAlpine'] += (int) $row->hasAttribute('x-data') + count($m['html']->select('[x-data]', $row));
        }

        return $m;
    }

    private function assertListGrowth(array $list): array
    {
        $this->fakeAiForLightLists();
        $this->loginForLightLists();
        $samples = [];
        foreach ([5, 15] as $n) {
            $ids = ($list['seed'])($n);
            $url = is_callable($list['url']) ? ($list['url'])() : $list['url'];
            if ($n === 5) {
                $this->get($url)->assertOk();
            }
            $m = $this->measureGrowthPage($url, $list);
            Assert::assertCount($n, $m['ids'], 'Growth fixture must render every seeded row: '.$url);
            Assert::assertEqualsCanonicalizing(array_map('strval', $ids), $m['ids'], 'Unexpected row identities: '.$url);
            Assert::assertCount($n, array_unique($m['ids']), 'Repeated row identity: '.$url);
            $samples[$n] = $m;
        }
        foreach (['queries', 'rowAlpine', 'alpine', 'livewire'] as $metric) {
            Assert::assertSame($samples[5][$metric], $samples[15][$metric], $metric.' grows with rows: '.$url);
        }
        $ids = ($list['seed'])(201);
        $bound = $this->measureGrowthPage(is_callable($list['url']) ? ($list['url'])() : $list['url'], $list);
        Assert::assertGreaterThan(0, count($bound['ids']));
        Assert::assertLessThanOrEqual($list['pageSize'], count($bound['ids']), 'List lost its bound: '.$url);
        Assert::assertSame([], array_values(array_diff($bound['ids'], array_map('strval', $ids))));
        Assert::assertSame(count($bound['ids']), count(array_unique($bound['ids'])));
        Assert::assertNotEmpty($bound['html']->select($list['next'] ?? '.fi-pagination-next-btn'), 'Missing next-page control: '.$url);
        $result = ['bytes' => ($samples[15]['bytes'] - $samples[5]['bytes']) / 10,
            'elements' => ($samples[15]['elements'] - $samples[5]['elements']) / 10,
            'small' => array_intersect_key($samples[5], array_flip(['bytes', 'elements', 'queries', 'alpine', 'livewire', 'rowAlpine'])),
            'large' => array_intersect_key($samples[15], array_flip(['bytes', 'elements', 'queries', 'alpine', 'livewire', 'rowAlpine'])),
            'boundedRows' => count($bound['ids'])];
        $this->listMeasurements[$list['name']] = $result;
        fwrite(STDOUT, 'LightLists growth '.$list['name'].' '.json_encode($result).PHP_EOL);
        ($list['seed'])(0);

        return $result;
    }

    private function measuredDebtReason(string $name): string
    {
        $m = $this->listMeasurements[$name];
        Assert::assertTrue($m['bytes'] > LightLists::PER_ITEM['bytes'] || $m['elements'] > LightLists::PER_ITEM['elements'], 'HTML debt resolved; move '.$name.' to the full perItem contract.');

        return sprintf('Measured heavy fixture: %.1f bytes and %.1f elements per row (budget 5120 / 40); zero query/controller/component growth and bounded to %d rows.', $m['bytes'], $m['elements'], $m['boundedRows']);
    }
}
