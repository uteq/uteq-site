<?php

namespace App\Livewire;

use App\Mail\KeuringMail;
use App\Models\Keuring;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Component;

class KeuringAanvraag extends Component
{
    #[Locked]
    public string $bron = 'direct';

    public array $antwoorden = ['meenemen' => 'Nee, ik kom kijken en luisteren'];

    public bool $akkoord = false;

    public string $wachtlijstEmail = '';

    public string $hp = '';

    /** null, 'aanvraag' of 'wachtlijst' */
    public ?string $klaar = null;

    public string $voornaam = '';

    public function mount(): void
    {
        $this->bron = Str::limit(Str::slug((string) request()->query('bron', '')), 50, '') ?: 'direct';
    }

    public function aanvragen(): void
    {
        if (Keuring::stand() !== 'open') {
            return;
        }

        $velden = config('keuring.aanvraag');
        $this->validate(
            Keuring::regels($velden, 'antwoorden') + ['akkoord' => 'accepted', 'hp' => 'prohibited'],
            Keuring::MELDINGEN,
        );
        $this->beperk();

        $a = Arr::only($this->antwoorden, array_keys($velden));
        $wachtlijst = $a['medewerkers'] === 'Alleen ik';
        $keuring = Keuring::create([
            'status' => $wachtlijst ? 'wachtlijst' : 'aangemeld',
            'bron' => $this->bron,
            'email' => strtolower(trim($a['email'])),
            'naam' => $a['naam'],
            'bedrijf' => $a['bedrijf'],
            'personen' => $wachtlijst ? null : ($a['personen'] === 'Met een collega' ? 2 : 1),
            'aanvraag' => $a,
        ]);

        $mee = $a['meenemen'] === 'Ja, ik neem iets mee' ? 'neemt iets mee' : 'komt kijken';
        KeuringMail::stuur($keuring->email, $keuring, $wachtlijst ? 'wachtlijst-bevestiging' : 'aanvraag-bevestiging',
            $wachtlijst ? 'Je staat op de lijst voor de volgende bouwkundige keuring' : 'Je bent aangemeld voor de avond van 28 oktober');
        KeuringMail::stuur(config('keuring.ontvangers'), $keuring, 'aanvraag-melding', $wachtlijst
            ? "Wachtlijst keuring: {$keuring->bedrijf} ({$a['medewerkers']})"
            : "Nieuwe aanmelding avond: {$keuring->bedrijf} ({$keuring->personen} pers., {$mee})");

        $this->klaar = $wachtlijst ? 'wachtlijst' : 'aanvraag';
        $this->voornaam = $keuring->voornaam();
        $this->dispatch('keuring-verstuurd', bron: $this->bron, status: $keuring->status);
    }

    /** Alleen een e-mailadres, als het formulier dicht of vol is. */
    public function wachtlijst(): void
    {
        $this->validate(['wachtlijstEmail' => 'required|email|max:255', 'hp' => 'prohibited'], Keuring::MELDINGEN);
        $this->beperk();

        $keuring = Keuring::create([
            'status' => 'wachtlijst',
            'bron' => $this->bron,
            'email' => strtolower(trim($this->wachtlijstEmail)),
        ]);

        KeuringMail::stuur($keuring->email, $keuring, 'wachtlijst-bevestiging', 'Je staat op de lijst voor de volgende bouwkundige keuring');
        KeuringMail::stuur(config('keuring.ontvangers'), $keuring, 'aanvraag-melding', "Wachtlijst keuring: {$keuring->email}");

        $this->klaar = 'wachtlijst';
        $this->dispatch('keuring-verstuurd', bron: $this->bron, status: 'wachtlijst');
    }

    private function beperk(): void
    {
        $sleutel = 'keuring:'.request()->ip();

        if (RateLimiter::tooManyAttempts($sleutel, 5)) {
            throw ValidationException::withMessages(['versturen' => 'Er is vanaf jouw verbinding al een paar keer iets verstuurd. Probeer het over een uur opnieuw.']);
        }

        RateLimiter::hit($sleutel, 3600);
    }

    public function render()
    {
        return view('livewire.keuring-aanvraag', ['stand' => Keuring::stand()]);
    }
}
