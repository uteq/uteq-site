<?php

namespace App\Livewire;

use App\Models\Instelling;
use App\Models\Keuring;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Symfony\Component\HttpFoundation\StreamedResponse;

/** Overzicht voor Nathan en Johan. De route zit achter auth.basic; boot() checkt het bij elke Livewire-call opnieuw. */
class KeuringBeheer extends Component
{
    public int $plaatsenOver = 10;

    public int $kop = 1;

    public string $formulier = 'auto';

    public bool $opgeslagen = false;

    public function boot(): void
    {
        abort_unless(auth()->check(), 403);
    }

    public function mount(): void
    {
        $this->plaatsenOver = Keuring::plaatsenOver();
        $this->kop = (int) Instelling::get('kop', 1);
        $this->formulier = Instelling::get('formulier', 'auto');
    }

    public function opslaan(): void
    {
        $this->validate([
            'plaatsenOver' => 'required|integer|min:0|max:'.config('keuring.plaatsen'),
            'kop' => ['required', Rule::in(array_keys(config('keuring.koppen')))],
            'formulier' => 'required|in:auto,open,gesloten',
        ]);

        Instelling::set('plaatsen_over', $this->plaatsenOver);
        Instelling::set('kop', $this->kop);
        Instelling::set('formulier', $this->formulier);
        $this->opgeslagen = true;
    }

    public function status(int $id, string $status): void
    {
        abort_unless(in_array($status, config('keuring.statussen'), true), 422);
        Keuring::findOrFail($id)->update(['status' => $status]);
    }

    public function export(): StreamedResponse
    {
        $aanvraag = config('keuring.aanvraag');
        $dossier = Keuring::dossierVelden();

        return response()->streamDownload(function () use ($aanvraag, $dossier) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF");
            fputcsv($out, array_merge(
                ['id', 'aangemaakt_op', 'status', 'bron', 'e-mail', 'personen', 'totaal excl. btw', 'dossierlink', 'dossier_op'],
                array_map(fn ($v) => 'A: '.Keuring::label($v), array_values($aanvraag)),
                array_map(fn ($v) => 'B: '.Keuring::label($v), array_values($dossier)),
            ));
            foreach (Keuring::oldest()->cursor() as $k) {
                fputcsv($out, array_merge(
                    [$k->id, $k->created_at->timezone('Europe/Amsterdam')->format('Y-m-d H:i'), $k->status, $k->bron, $k->email, $k->personen, $k->totaal(), $k->naam ? $k->dossierUrl() : '', $k->dossier_op?->timezone('Europe/Amsterdam')->format('Y-m-d H:i')],
                    array_map(fn ($key) => Keuring::waarde($k->aanvraag[$key] ?? ''), array_keys($aanvraag)),
                    array_map(fn ($key) => Keuring::waarde($k->dossier[$key] ?? ''), array_keys($dossier)),
                ));
            }
            fclose($out);
        }, 'keuringen-'.now()->format('Y-m-d').'.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function render()
    {
        return view('livewire.keuring-beheer', [
            'keuringen' => Keuring::latest()->get(),
            'stand' => Keuring::stand(),
        ])->layout('components.layouts.app', ['nav' => false, 'fullTitle' => 'Keuringen · beheer']);
    }
}
