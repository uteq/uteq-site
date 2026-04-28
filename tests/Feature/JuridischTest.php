<?php

namespace Tests\Feature;

use Tests\TestCase;

class JuridischTest extends TestCase
{
    public function test_juridisch_index_loads(): void
    {
        $this->get(route('juridisch.index'))
            ->assertSuccessful()
            ->assertSee('Juridisch')
            ->assertSee('Algemene Voorwaarden')
            ->assertSee('SaaS-Voorwaarden')
            ->assertSee('Verwerkersovereenkomst')
            ->assertSee('Privacy');
    }

    public function test_algemene_voorwaarden_page_loads(): void
    {
        $this->get(route('juridisch.show', 'algemene-voorwaarden'))
            ->assertSuccessful()
            ->assertSee('Algemene Voorwaarden UTEQ')
            ->assertSee('versie 1.1')
            ->assertSee('Download PDF', false);
    }

    public function test_saas_voorwaarden_page_loads(): void
    {
        $this->get(route('juridisch.show', 'saas-voorwaarden'))
            ->assertSuccessful()
            ->assertSee('SaaS-Voorwaarden UTEQ');
    }

    public function test_verwerkersovereenkomst_page_loads(): void
    {
        $this->get(route('juridisch.show', 'verwerkersovereenkomst'))
            ->assertSuccessful()
            ->assertSee('Verwerkersovereenkomst');
    }

    public function test_privacy_page_loads_via_dedicated_route(): void
    {
        $this->get(route('privacy'))
            ->assertSuccessful()
            ->assertSee('Privacy Statement UTEQ')
            ->assertSee('versie 1.0');
    }

    public function test_unknown_juridisch_slug_returns_404(): void
    {
        $this->get('/juridisch/onbekend-document')
            ->assertNotFound();
    }

    public function test_pdf_download_files_exist(): void
    {
        $expected = [
            'algemene-voorwaarden-v1.1.pdf',
            'saas-voorwaarden-v1.1.pdf',
            'verwerkersovereenkomst-v1.0.pdf',
            'privacy-v1.0.pdf',
        ];

        foreach ($expected as $file) {
            $path = public_path("juridisch/{$file}");
            $this->assertFileExists($path, "Verwacht PDF op {$path}; draai scripts/sync-juridisch.sh");
        }
    }

    public function test_juridisch_pages_have_no_em_dashes(): void
    {
        $slugs = ['algemene-voorwaarden', 'saas-voorwaarden', 'verwerkersovereenkomst'];

        foreach ($slugs as $slug) {
            $response = $this->get(route('juridisch.show', $slug));
            $this->assertStringNotContainsString(
                '—',
                $response->getContent(),
                "Em-dash gevonden in {$slug}"
            );
        }

        $privacy = $this->get(route('privacy'));
        $this->assertStringNotContainsString('—', $privacy->getContent(), 'Em-dash in privacy-pagina');
    }

    public function test_footer_links_to_juridisch_and_privacy(): void
    {
        $response = $this->get(route('home'));
        $response->assertSee('href="/juridisch"', false);
        $response->assertSee('href="/privacy"', false);
    }
}
