<?php

namespace Tests\Feature;

use Tests\TestCase;

class VacancyTest extends TestCase
{
    public function testVacancyOverviewLinksToDeveloperVacancy(): void
    {
        $this->get('/vacatures')
            ->assertSuccessful()
            ->assertSee('Vacatures')
            ->assertSee('Full Stack Medior Developer')
            ->assertSee(route('vacature.developer'), false);

        $home = $this->get('/')->assertSuccessful();

        self::assertSame(2, substr_count($home->getContent(), route('vacatures')));
    }

    public function testDeveloperVacancyIsPubliclyAvailable(): void
    {
        $this->get('/vacature/full-stack-medior-developer')
            ->assertSuccessful()
            ->assertSeeTextInOrder(['Full Stack Medior Developer', 'AI Enabled'])
            ->assertSee('Solliciteren')
            ->assertSee('4 oktober 2026')
            ->assertSee('Recruiters hoeven niet te reageren');
    }
}
