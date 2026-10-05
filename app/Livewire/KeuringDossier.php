<?php

namespace App\Livewire;

use App\Mail\KeuringMail;
use App\Models\Keuring;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Component;

class KeuringDossier extends Component
{
    #[Locked]
    public int $keuringId;

    public array $antwoorden = [];

    public bool $klaar = false;

    public function mount(string $token): void
    {
        $keuring = Keuring::where('token', $token)->whereNotNull('naam')->firstOrFail();
        $this->keuringId = $keuring->id;
        $this->klaar = $keuring->dossier_op !== null;

        foreach (Keuring::dossierVelden() as $key => $veld) {
            $this->antwoorden[$key] = $veld['type'] === 'checkbox' ? [] : '';
        }
    }

    public function versturen(): void
    {
        if (! Keuring::dossierOpen() || $this->klaar) {
            return;
        }

        $velden = Keuring::dossierVelden();
        $this->validate(Keuring::regels($velden, 'antwoorden'), Keuring::MELDINGEN);

        $sleutel = 'keuring-dossier:'.request()->ip();
        if (RateLimiter::tooManyAttempts($sleutel, 5)) {
            throw ValidationException::withMessages(['versturen' => 'Er is vanaf jouw verbinding al een paar keer iets verstuurd. Probeer het over een uur opnieuw.']);
        }
        RateLimiter::hit($sleutel, 3600);

        $keuring = Keuring::findOrFail($this->keuringId);
        $keuring->update([
            'dossier' => Arr::only($this->antwoorden, array_keys($velden)),
            'personen' => $this->antwoorden['personen'] === 'Met een collega' ? 2 : 1,
            'dossier_op' => now(),
            'status' => in_array($keuring->status, ['aangevraagd', 'toegelaten']) ? 'dossier binnen' : $keuring->status,
        ]);

        KeuringMail::stuur($keuring->email, $keuring, 'dossier-bevestiging', 'Je bouwdossier is binnen');
        KeuringMail::stuur(config('keuring.ontvangers'), $keuring, 'dossier-melding',
            "Bouwdossier binnen: {$keuring->bedrijf} ({$keuring->personen} ".($keuring->personen === 1 ? 'persoon' : 'personen').')');

        $this->klaar = true;
    }

    public function render()
    {
        return view('livewire.keuring-dossier')
            ->layout('components.layouts.app', ['nav' => false, 'fullTitle' => 'Je bouwdossier · Bouwkundige keuring · Uteq', 'brandSuffix' => 'met Growth AI']);
    }
}
