@push('head')<meta name="robots" content="noindex, nofollow">@endpush
<div class="bg-gray-50 min-h-screen px-4 sm:px-6 pt-32 pb-20">
    <div class="max-w-7xl mx-auto space-y-8">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h1 class="font-sregs-display text-3xl text-secondary">Keuringen</h1>
                <p class="text-gray-600 mt-1">
                    Formulier nu: <strong>{{ $stand }}</strong> ·
                    @foreach ($keuringen->countBy('status') as $status => $aantal){{ $status }}: {{ $aantal }}@if (! $loop->last) · @endif @endforeach
                    · personen met dossier: {{ $keuringen->sum('personen') }}
                </p>
            </div>
            <button wire:click="export" class="btn-primary !rounded-lg px-5 py-2.5 text-sm">CSV-export</button>
        </div>

        <form wire:submit="opslaan" class="rounded-2xl border border-gray-200 bg-white p-6 grid sm:grid-cols-4 gap-4 items-end">
            <div>
                <label for="plaatsen" class="block text-sm font-semibold text-secondary mb-1">Nog over (teller)</label>
                <input id="plaatsen" type="number" min="0" max="{{ config('keuring.plaatsen') }}" wire:model="plaatsenOver" class="w-full rounded-lg border-gray-300">
                @error('plaatsenOver')<p class="text-sm text-red-700 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="kop" class="block text-sm font-semibold text-secondary mb-1">Kop</label>
                <select id="kop" wire:model="kop" class="w-full rounded-lg border-gray-300">
                    @foreach (config('keuring.koppen') as $nr => $kop)<option value="{{ $nr }}">{{ $nr }}: {{ trim(implode(' ', $kop)) }}</option>@endforeach
                </select>
            </div>
            <div>
                <label for="formulier" class="block text-sm font-semibold text-secondary mb-1">Formulier</label>
                <select id="formulier" wire:model="formulier" class="w-full rounded-lg border-gray-300">
                    <option value="auto">Automatisch (dicht na 14 oktober)</option>
                    <option value="open">Altijd open</option>
                    <option value="gesloten">Gesloten</option>
                </select>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" class="btn-primary !rounded-lg px-5 py-2.5 text-sm">Opslaan</button>
                @if ($opgeslagen)<span class="text-sm text-gray-600" role="status">Opgeslagen.</span>@endif
            </div>
        </form>

        <div class="overflow-x-auto rounded-2xl border border-gray-200 bg-white">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3">Aanvraag</th><th class="p-3">Team / belang</th><th class="p-3">Bron</th><th class="p-3">Status</th><th class="p-3">Personen</th><th class="p-3">Dossierlink</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 align-top">
                    @forelse ($keuringen as $k)
                        <tr wire:key="k-{{ $k->id }}">
                            <td class="p-3 max-w-md">
                                <p class="font-semibold text-secondary">{{ $k->bedrijf ?? '(alleen e-mail)' }}</p>
                                <p class="text-gray-600">{{ $k->naam }} · <a href="mailto:{{ $k->email }}" class="underline">{{ $k->email }}</a></p>
                                <p class="text-gray-500 text-xs">{{ $k->created_at->timezone('Europe/Amsterdam')->format('d-m H:i') }}</p>
                                @if ($k->aanvraag)
                                    <details class="mt-2">
                                        <summary class="cursor-pointer text-gray-700">Aanvraag @if ($k->dossier) en dossier @endif</summary>
                                        <dl class="mt-2 space-y-1">
                                            @foreach ($k->aanvraagRegels() as $label => $antwoord)
                                                <div><dt class="inline font-semibold">{{ $label }}:</dt> <dd class="inline whitespace-pre-line">{{ $antwoord }}</dd></div>
                                            @endforeach
                                            @foreach ($k->dossier ? $k->dossierRegels() : [] as $blok => $regels)
                                                <p class="pt-2 font-mono text-xs uppercase text-gray-500">{{ $loop->index }}. {{ $blok }}</p>
                                                @foreach ($regels as $label => $antwoord)
                                                    <div><dt class="inline font-semibold">{{ $label }}:</dt> <dd class="inline whitespace-pre-line">{{ $antwoord }}</dd></div>
                                                @endforeach
                                            @endforeach
                                        </dl>
                                    </details>
                                @endif
                            </td>
                            <td class="p-3">{{ $k->aanvraag['medewerkers'] ?? '' }}<br>{{ $k->aanvraag['belang'] ?? '' }}</td>
                            <td class="p-3">{{ $k->bron }}</td>
                            <td class="p-3">
                                <label class="sr-only" for="status-{{ $k->id }}">Status</label>
                                <select id="status-{{ $k->id }}" wire:change="status({{ $k->id }}, $event.target.value)" class="rounded-lg border-gray-300 text-sm">
                                    @foreach (config('keuring.statussen') as $s)<option value="{{ $s }}" @selected($k->status === $s)>{{ $s }}</option>@endforeach
                                </select>
                            </td>
                            <td class="p-3 whitespace-nowrap">@if ($k->personen){{ $k->personen }} · €{{ $k->totaal() }} excl. btw @else – @endif</td>
                            <td class="p-3">
                                @if ($k->naam)
                                    <button type="button" x-data="{ ok: false }" x-on:click="navigator.clipboard.writeText('{{ $k->dossierUrl() }}'); ok = true; setTimeout(() => ok = false, 1500)" class="rounded-lg border border-gray-300 px-3 py-1.5 hover:border-primary">
                                        <span x-show="! ok">Kopieer link</span><span x-cloak x-show="ok">Gekopieerd</span>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-6 text-gray-600">Nog geen aanvragen.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
