<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Keuring extends Model
{
    protected $table = 'keuringen';

    protected $guarded = [];

    protected $casts = [
        'aanvraag' => 'array',
        'dossier' => 'array',
        'dossier_op' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(fn (Keuring $k) => $k->token ??= Str::random(40));
    }

    /** open, gesloten of vol. Instelling "formulier" (auto, open, gesloten) gaat voor de deadline. */
    public static function stand(): string
    {
        $formulier = Instelling::get('formulier', 'auto');
        $voorbij = now()->gte(Carbon::parse(config('keuring.aanvragen_tot'), 'Europe/Amsterdam'));

        if ($formulier === 'gesloten' || ($formulier === 'auto' && $voorbij)) {
            return 'gesloten';
        }

        return static::plaatsenOver() <= 0 ? 'vol' : 'open';
    }

    public static function plaatsenOver(): int
    {
        return (int) Instelling::get('plaatsen_over', config('keuring.plaatsen'));
    }

    /** @return array{0: string, 1: string, 2: string} */
    public static function kop(): array
    {
        $koppen = config('keuring.koppen');

        return $koppen[(int) Instelling::get('kop', 1)] ?? $koppen[1];
    }

    public static function dossierOpen(): bool
    {
        return now()->lt(Carbon::parse(config('keuring.dossier_tot'), 'Europe/Amsterdam'));
    }

    /** Alle dossiervelden zonder blokindeling. */
    public static function dossierVelden(): array
    {
        return array_merge(...array_values(config('keuring.dossier')));
    }

    /** Label van een veld, met de adressen uit de config ingevuld. */
    public static function label(array $veld): string
    {
        return strtr($veld['label'], [':keuringsadres' => config('keuring.keuringsadres'), ':github' => config('keuring.github_account')]);
    }

    /** Validatieregels voor velden uit config/keuring.php, onder $prefix. */
    public static function regels(array $velden, string $prefix): array
    {
        $regels = [];

        foreach ($velden as $key => $veld) {
            $verplicht = match (true) {
                $veld['type'] === 'accept' => 'accepted',
                ! empty($veld['required']) => 'required',
                isset($veld['required_if']) => "required_if:{$prefix}.{$veld['required_if'][0]},{$veld['required_if'][1]}",
                default => 'nullable',
            };

            $regels["{$prefix}.{$key}"] = array_merge([$verplicht], match ($veld['type']) {
                'email' => ['email', 'max:255'],
                'textarea' => ['string', 'max:5000'],
                'number' => ['integer', 'min:1', 'max:1000000'],
                'select', 'radio' => [Rule::in($veld['options'])],
                'checkbox' => ['array'],
                'accept' => [],
                default => ['string', 'max:500'],
            });

            if ($veld['type'] === 'checkbox') {
                $regels["{$prefix}.{$key}.*"] = [Rule::in($veld['options'])];
            }
        }

        return $regels;
    }

    public const MELDINGEN = [
        'required' => 'Vul dit in.',
        'required_if' => 'Vul dit in.',
        'accepted' => 'Vink dit aan om verder te gaan.',
        'email' => 'Vul een geldig e-mailadres in.',
        'in' => 'Kies een van de opties.',
        'integer' => 'Vul een getal in.',
        'min' => 'Vul een getal van 1 of meer in.',
        'max' => 'Dit is te lang.',
        'prohibited' => 'Laat dit veld leeg.',
    ];

    public static function waarde(mixed $waarde): string
    {
        return match (true) {
            is_array($waarde) => implode(', ', $waarde),
            is_bool($waarde) => $waarde ? 'Ja' : 'Nee',
            default => (string) $waarde,
        };
    }

    /** @return array<string, string> label => antwoord */
    public function aanvraagRegels(): array
    {
        return collect(config('keuring.aanvraag'))
            ->mapWithKeys(fn ($veld, $key) => [static::label($veld) => static::waarde($this->aanvraag[$key] ?? '')])
            ->all();
    }

    /** @return array<string, array<string, string>> blok => [label => antwoord] */
    public function dossierRegels(): array
    {
        return collect(config('keuring.dossier'))
            ->map(fn ($velden) => collect($velden)
                ->mapWithKeys(fn ($veld, $key) => [static::label($veld) => static::waarde($this->dossier[$key] ?? '')])
                ->all())
            ->all();
    }

    public function voornaam(): string
    {
        return Str::before(trim((string) $this->naam), ' ');
    }

    public function dossierUrl(): string
    {
        return route('keuring.dossier', $this->token);
    }

    public function totaal(): ?int
    {
        return $this->personen ? $this->personen * config('keuring.prijs') : null;
    }
}
