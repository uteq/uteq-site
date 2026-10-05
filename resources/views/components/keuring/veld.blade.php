@props(['naam', 'veld', 'dark' => false])
@php
    $id = 'veld-'.$naam;
    $label = \App\Models\Keuring::label($veld);
    $verplicht = ! empty($veld['required']);
    $fout = $errors->first("antwoorden.$naam") ?: $errors->first("antwoorden.$naam.*");
    $tekst = $dark ? 'text-white' : 'text-secondary';
    $hint = $dark ? 'text-gray-400' : 'text-gray-500';
    $invoer = 'w-full rounded-lg px-3 py-2.5 focus:border-primary focus:ring-2 focus:ring-primary/30 '
        .($dark ? 'bg-white/5 border-white/15 text-white placeholder-gray-500' : 'border-gray-300 text-secondary placeholder-gray-400');
    $keuze = 'flex items-center gap-2 rounded-lg border px-3 py-2 text-sm cursor-pointer transition-colors peer-checked:border-primary peer-focus-visible:ring-2 peer-focus-visible:ring-primary '
        .($dark ? 'border-white/15 text-gray-200 peer-checked:bg-primary/10 peer-checked:text-white' : 'border-gray-300 text-secondary peer-checked:bg-primary/10');
    $foutKleur = $dark ? 'text-[#FF8A84]' : 'text-red-700';
    $beschrijving = trim(($veld['hint'] ?? '') ? "$id-hint" : '').($fout ? " $id-fout" : '');
@endphp

<div {{ $attributes->class([($veld['half'] ?? false) ? 'sm:col-span-1' : 'sm:col-span-2']) }}>
    @if (in_array($veld['type'], ['radio', 'checkbox']))
        <fieldset @if ($beschrijving) aria-describedby="{{ trim($beschrijving) }}" @endif>
            <legend class="block text-sm font-semibold {{ $tekst }} mb-2">{{ $label }}@if ($verplicht)<span aria-hidden="true"> *</span><span class="sr-only"> (verplicht)</span>@endif</legend>
            @if ($veld['hint'] ?? false)<p id="{{ $id }}-hint" class="text-sm {{ $hint }} -mt-1 mb-2">{{ strtr($veld['hint'], [':github' => config('keuring.github_account')]) }}</p>@endif
            <div class="flex flex-wrap gap-2">
                @foreach ($veld['options'] as $i => $optie)
                    <label class="relative">
                        <input type="{{ $veld['type'] }}" wire:model="antwoorden.{{ $naam }}" value="{{ $optie }}" name="{{ $naam }}{{ $veld['type'] === 'checkbox' ? '[]' : '' }}" class="peer sr-only">
                        <span class="{{ $keuze }}">{{ $optie }}</span>
                    </label>
                @endforeach
            </div>
        </fieldset>
    @elseif ($veld['type'] === 'accept')
        <label class="flex items-start gap-3 text-sm {{ $tekst }} cursor-pointer">
            <input id="{{ $id }}" type="checkbox" wire:model="antwoorden.{{ $naam }}" class="mt-0.5 h-5 w-5 rounded border-gray-400 text-primary focus:ring-primary" @if ($fout) aria-describedby="{{ $id }}-fout" @endif>
            <span>{{ $label }}<span aria-hidden="true"> *</span><span class="sr-only"> (verplicht)</span></span>
        </label>
    @else
        <label for="{{ $id }}" class="block text-sm font-semibold {{ $tekst }} mb-1.5">{{ $label }}@if ($verplicht)<span aria-hidden="true"> *</span><span class="sr-only"> (verplicht)</span>@endif</label>
        @if ($veld['hint'] ?? false)<p id="{{ $id }}-hint" class="text-sm {{ $hint }} -mt-1 mb-1.5">{{ strtr($veld['hint'], [':github' => config('keuring.github_account')]) }}</p>@endif
        @if ($veld['type'] === 'textarea')
            <textarea id="{{ $id }}" wire:model="antwoorden.{{ $naam }}" rows="{{ $veld['rows'] ?? 3 }}" maxlength="5000" placeholder="{{ $veld['placeholder'] ?? '' }}" class="{{ $invoer }}" @if ($verplicht) required @endif @if ($beschrijving) aria-describedby="{{ trim($beschrijving) }}" @endif></textarea>
        @elseif ($veld['type'] === 'select')
            <select id="{{ $id }}" wire:model="antwoorden.{{ $naam }}" class="{{ $invoer }}" @if ($verplicht) required @endif @if ($beschrijving) aria-describedby="{{ trim($beschrijving) }}" @endif>
                <option value="">Kies…</option>
                @foreach ($veld['options'] as $optie)<option value="{{ $optie }}">{{ $optie }}</option>@endforeach
            </select>
        @else
            <input id="{{ $id }}" wire:model="antwoorden.{{ $naam }}"
                type="{{ $veld['type'] === 'url' ? 'text' : $veld['type'] }}"
                @if ($veld['type'] === 'url') inputmode="url" @endif
                @if ($veld['type'] === 'number') min="1" inputmode="numeric" @endif
                @if ($veld['autocomplete'] ?? false) autocomplete="{{ $veld['autocomplete'] }}" @endif
                maxlength="{{ $veld['type'] === 'number' ? 7 : 500 }}"
                placeholder="{{ $veld['placeholder'] ?? '' }}" class="{{ $invoer }}" @if ($verplicht) required @endif
                @if ($beschrijving) aria-describedby="{{ trim($beschrijving) }}" @endif>
        @endif
    @endif
    @if ($fout)<p id="{{ $id }}-fout" class="mt-1.5 text-sm {{ $foutKleur }}">{{ $fout }}</p>@endif
</div>
