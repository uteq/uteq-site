<?php

namespace Tests\Feature;

use App\Livewire\KeuringAanvraag;
use App\Livewire\KeuringBeheer;
use App\Livewire\KeuringDossier;
use App\Mail\KeuringMail;
use App\Models\Instelling;
use App\Models\Keuring;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class KeuringTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
        Carbon::setTestNow(Carbon::parse('2026-10-06 12:00', 'Europe/Amsterdam'));
    }

    private function aanvraag(array $anders = []): array
    {
        return array_merge([
            'naam' => 'Anne de Vries', 'functie' => 'Eigenaar', 'email' => 'anne@example.nl', 'telefoon' => '0612345678',
            'bedrijf' => 'De Vries Installatie', 'website' => 'devries.nl', 'branche' => 'Bouw en installatie',
            'medewerkers' => '10-49', 'bouwzin' => 'Ik bouwde een planbord zodat onze monteurs zelf zien waar ze heen moeten.',
            'gebouwd_met' => ['Lovable', 'Make, Zapier of n8n'], 'gebruikers' => 'Mijn team', 'gebruikers_aantal' => 14,
            'belang' => 'We kunnen niet meer zonder', 'over_een_jaar' => 'Ook offertes maken.',
        ], $anders);
    }

    public function test_pagina_laadt_met_meta_en_teksten(): void
    {
        $this->get('/keuring')->assertOk()
            ->assertSee('<title>Bouwkundige keuring voor je AI · 28 oktober · Uteq</title>', false)
            ->assertSee('images/keuring/og-image.png')
            ->assertSee('Jij ziet de gevel.')
            ->assertSee('Nog 10 van de 10 keuringen')
            ->assertSee('id="aanvragen"', false)
            ->assertDontSee('Aanvragen is gesloten');
    }

    public function test_kop_en_teller_komen_uit_de_instellingen(): void
    {
        Instelling::set('kop', 3);
        Instelling::set('plaatsen_over', 4);

        $this->get('/keuring')->assertSee('Een huis koop je niet zonder keuring.')->assertSee('Nog 4 van de 10 keuringen');
    }

    public function test_aanvraag_wordt_opgeslagen_met_bron_en_mails(): void
    {
        Livewire::withQueryParams(['bron' => 'advertentie'])->test(KeuringAanvraag::class)
            ->set('antwoorden', $this->aanvraag())
            ->set('akkoord', true)
            ->call('aanvragen')
            ->assertHasNoErrors()
            ->assertSet('klaar', 'aanvraag')
            ->assertSee('Bedankt, Anne.')
            ->assertDispatched('keuring-verstuurd');

        $k = Keuring::sole();
        $this->assertSame(['advertentie', 'aangevraagd', 'De Vries Installatie'], [$k->bron, $k->status, $k->bedrijf]);
        $this->assertSame(14, $k->aanvraag['gebruikers_aantal']);
        $this->assertSame(40, strlen($k->token));

        Mail::assertSent(KeuringMail::class, fn ($m) => $m->hasTo('anne@example.nl') && $m->onderwerp === 'Je aanvraag voor de bouwkundige keuring is binnen');
        Mail::assertSent(KeuringMail::class, fn ($m) => $m->hasTo('info@uteq.nl')
            && $m->onderwerp === 'Nieuwe aanvraag keuring: De Vries Installatie (10-49, We kunnen niet meer zonder)');
    }

    public function test_zonder_bron_is_het_direct(): void
    {
        Livewire::test(KeuringAanvraag::class)->set('antwoorden', $this->aanvraag())->set('akkoord', true)->call('aanvragen');

        $this->assertSame('direct', Keuring::sole()->bron);
    }

    public function test_verplichte_velden_en_akkoord(): void
    {
        Livewire::test(KeuringAanvraag::class)
            ->set('antwoorden', $this->aanvraag(['bedrijf' => '', 'gebouwd_met' => [], 'branche' => 'Hacker']))
            ->call('aanvragen')
            ->assertHasErrors(['antwoorden.bedrijf', 'antwoorden.gebouwd_met', 'antwoorden.branche', 'akkoord']);

        $this->assertSame(0, Keuring::count());
    }

    public function test_alleen_ik_gaat_naar_de_wachtlijst(): void
    {
        Livewire::test(KeuringAanvraag::class)
            ->assertSee('Deze editie is voor ondernemers met een team. Je kunt je wel aanmelden voor de volgende editie.')
            ->set('antwoorden', $this->aanvraag(['medewerkers' => 'Alleen ik']))->set('akkoord', true)
            ->call('aanvragen')
            ->assertSet('klaar', 'wachtlijst');

        $this->assertSame('wachtlijst', Keuring::sole()->status);
    }

    public function test_honeypot_en_rate_limit(): void
    {
        Livewire::test(KeuringAanvraag::class)->set('antwoorden', $this->aanvraag())->set('akkoord', true)->set('hp', 'spam')
            ->call('aanvragen')->assertHasErrors('hp');
        $this->assertSame(0, Keuring::count());

        for ($i = 0; $i < 5; $i++) {
            Livewire::test(KeuringAanvraag::class)->set('antwoorden', $this->aanvraag())->set('akkoord', true)->call('aanvragen');
        }
        Livewire::test(KeuringAanvraag::class)->set('antwoorden', $this->aanvraag())->set('akkoord', true)
            ->call('aanvragen')->assertHasErrors('versturen');
        $this->assertSame(5, Keuring::count());
    }

    public function test_na_de_deadline_is_het_gesloten_met_wachtlijst(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-10-14 23:59', 'Europe/Amsterdam'));
        $this->assertSame('open', Keuring::stand());

        Carbon::setTestNow(Carbon::parse('2026-10-15 00:00', 'Europe/Amsterdam'));
        $this->assertSame('gesloten', Keuring::stand());

        Livewire::test(KeuringAanvraag::class)
            ->assertSee('Aanvragen is gesloten. Wil je bij een volgende editie zijn? Laat je e-mail achter.')
            ->set('antwoorden', $this->aanvraag())->set('akkoord', true)->call('aanvragen')
            ->set('wachtlijstEmail', 'later@example.nl')->call('wachtlijst')
            ->assertSet('klaar', 'wachtlijst');

        $this->assertSame(['later@example.nl', 'wachtlijst'], [Keuring::sole()->email, Keuring::sole()->status]);

        Instelling::set('formulier', 'open');
        $this->assertSame('open', Keuring::stand());
    }

    public function test_vol_en_handmatig_gesloten(): void
    {
        Instelling::set('plaatsen_over', 0);
        Livewire::test(KeuringAanvraag::class)->assertSee('Alle tien keuringen zijn vergeven.');

        Instelling::set('plaatsen_over', 3);
        Instelling::set('formulier', 'gesloten');
        $this->assertSame('gesloten', Keuring::stand());
    }

    public function test_bouwdossier_via_persoonlijke_link(): void
    {
        $k = Keuring::create(['email' => 'anne@example.nl', 'naam' => 'Anne', 'bedrijf' => 'De Vries', 'status' => 'toegelaten', 'aanvraag' => $this->aanvraag()]);

        $this->get('/keuring/dossier/'.$k->token)->assertOk()->assertSee('Stuur nooit wachtwoorden of API-sleutels mee.');
        $this->get('/keuring/dossier/'.str_repeat('a', 40))->assertNotFound();

        $test = Livewire::test(KeuringDossier::class, ['token' => $k->token])
            ->set('antwoorden.personen', 'Met een collega')
            ->call('versturen')
            ->assertHasErrors(['antwoorden.collega', 'antwoorden.factuur', 'antwoorden.b_uitgenodigd', 'antwoorden.b_opname', 'antwoorden.b_keuren_hoe', 'antwoorden.b_toestemming']);

        $test->set('antwoorden.collega', 'Piet, planner')
            ->set('antwoorden.factuur', "De Vries BV\nDorpsstraat 1\nfactuur@devries.nl")
            ->set('antwoorden.b_uitgenodigd', 'Kan niet bij mijn oplossing')
            ->set('antwoorden.b_opname', 'https://loom.com/share/abc')
            ->set('antwoorden.b_keuren_hoe', 'Anoniem op het scherm')
            ->set('antwoorden.b_gegevens', ['Adressen', 'Sleutels van andere diensten'])
            ->set('antwoorden.b_toestemming', true)
            ->call('versturen')
            ->assertHasNoErrors()
            ->assertSee('Je bouwdossier is binnen.');

        $k->refresh();
        $this->assertSame(['dossier binnen', 2, 198], [$k->status, $k->personen, $k->totaal()]);
        Mail::assertSent(KeuringMail::class, fn ($m) => $m->hasTo('info@uteq.nl') && $m->onderwerp === 'Bouwdossier binnen: De Vries (2 personen)');
        Mail::assertSent(KeuringMail::class, fn ($m) => $m->hasTo('anne@example.nl') && $m->onderwerp === 'Je bouwdossier is binnen');

        $html = (new KeuringMail($k, 'dossier-melding', 'x'))->render();
        $this->assertLessThan(strpos($html, 'Het bouwwerk'), strpos($html, 'Factuur'));
    }

    public function test_beheer_is_afgeschermd(): void
    {
        Keuring::create(['email' => 'anne@example.nl', 'naam' => 'Anne', 'bedrijf' => 'Geheim BV', 'aanvraag' => $this->aanvraag()]);

        $this->get('/keuring/beheer')->assertUnauthorized();
        $this->get('/keuring')->assertDontSee('Geheim BV');

        $user = (new User)->forceFill(['id' => 1, 'name' => 'Nathan']);
        $this->actingAs($user)->get('/keuring/beheer')->assertOk()->assertSee('Geheim BV')->assertSee('Kopieer link');

        Livewire::actingAs($user)->test(KeuringBeheer::class)
            ->call('status', Keuring::sole()->id, 'gefactureerd')
            ->set('plaatsenOver', 7)->call('opslaan')
            ->call('export')->assertFileDownloaded('keuringen-2026-10-06.csv');

        $this->assertSame('gefactureerd', Keuring::sole()->status);
        $this->assertSame(7, Keuring::plaatsenOver());
    }

    public function test_invoer_kan_geen_links_in_de_melding_zetten(): void
    {
        $k = Keuring::create(['email' => 'a@b.nl', 'naam' => 'A', 'bedrijf' => 'X', 'aanvraag' => $this->aanvraag(['bouwzin' => '[Klik hier](https://phish.example)'])]);

        $this->assertStringNotContainsString('href="https://phish.example"', (new KeuringMail($k, 'aanvraag-melding', 'x'))->render());
    }

    public function test_timer_telt_af_tot_de_deadline_en_verdwijnt_daarna(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-10-13 22:58:30', 'Europe/Amsterdam'));
        $this->get('/keuring')->assertSee('Aanvragen sluit over')->assertSeeInOrder(['01', 'dagen', '01', 'uur', '01', 'min', '30', 'sec']);

        Carbon::setTestNow(Carbon::parse('2026-10-15 00:00', 'Europe/Amsterdam'));
        $this->get('/keuring')->assertDontSee('Aanvragen sluit over');
    }
}
