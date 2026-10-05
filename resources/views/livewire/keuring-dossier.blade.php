@push('head')<meta name="robots" content="noindex, nofollow">@endpush
<div class="bg-sand min-h-screen px-6 pt-32 pb-20">
    <div class="max-w-3xl mx-auto">
        <p class="font-mono text-xs tracking-[0.2em] uppercase text-gray-600 mb-4">Bouwkundige keuring · wo 28 oktober · Lokaal55 Sneek</p>
        <h1 class="font-sregs-display text-4xl sm:text-5xl text-secondary leading-tight mb-6">Je <span class="text-primary-dark">bouwdossier.</span></h1>

        @if ($klaar)
            <div class="rounded-2xl border border-primary bg-white p-6 sm:p-8" role="status">
                <p class="text-lg text-secondary">Je bouwdossier is binnen. De factuur volgt van Uteq. Tot woensdag 28 oktober in Lokaal55.</p>
            </div>
        @elseif (! \App\Models\Keuring::dossierOpen())
            <div class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8">
                <p class="text-lg text-secondary">Het bouwdossier kon tot en met maandag 19 oktober worden ingevuld. Mail ons via <a href="mailto:info@uteq.nl" class="underline">info@uteq.nl</a>.</p>
            </div>
        @else
            <p class="text-lg text-gray-700 mb-6">Ongeveer 10 minuten. "Weet ik niet" is altijd een goed antwoord. Dat is precies wat we keuren.</p>
            <div class="rounded-2xl border-2 border-[#FF5F57] bg-white p-5 mb-10 flex gap-3" role="note">
                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#FF5F57] text-white font-bold" aria-hidden="true">!</span>
                <p class="font-semibold text-secondary">Stuur nooit wachtwoorden of API-sleutels mee. Die hebben we niet nodig.</p>
            </div>

            <form wire:submit="versturen" class="space-y-6" novalidate>
                @foreach (config('keuring.dossier') as $blok => $velden)
                    <fieldset class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8">
                        <legend class="sr-only">Blok {{ $loop->index }}: {{ $blok }}</legend>
                        <h2 class="font-sregs-display text-2xl text-secondary mb-6" aria-hidden="true"><span class="text-gray-400 mr-2">{{ $loop->index }}</span>{{ $blok }}</h2>
                        <div class="grid sm:grid-cols-2 gap-x-5 gap-y-6">
                            @foreach ($velden as $naam => $veld)
                                @if ($naam === 'collega')
                                    <div x-cloak x-show="$wire.antwoorden.personen === 'Met een collega'" class="sm:col-span-2">
                                        <x-keuring.veld :naam="$naam" :veld="$veld" />
                                    </div>
                                @else
                                    <x-keuring.veld :naam="$naam" :veld="$veld" />
                                @endif
                            @endforeach
                        </div>
                        @if ($loop->first)
                            <p class="mt-6 text-sm text-gray-600">Na blok 0 stuurt Uteq de factuur. Elk ticket is een voucher van €99, die we verrekenen bij een opdracht vóór 1 december 2026.</p>
                        @endif
                    </fieldset>
                @endforeach

                @if ($errors->any())
                    <p class="text-sm text-red-700" role="alert">{{ $errors->first('versturen') ?: 'Niet alles is goed ingevuld. Kijk de rode meldingen hierboven na.' }}</p>
                @endif
                <button type="submit" class="btn-primary !rounded-lg w-full sm:w-auto" wire:loading.attr="disabled">
                    <span wire:loading.remove>Stuur mijn bouwdossier in</span>
                    <span wire:loading>Versturen…</span>
                </button>
            </form>
        @endif
    </div>
</div>
