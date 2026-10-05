<div x-on:keuring-verstuurd.window="window.plausible && window.plausible('Keuring aangevraagd', { props: { bron: $event.detail.bron, status: $event.detail.status } }); $el.scrollIntoView({ behavior: 'smooth', block: 'start' })" class="scroll-mt-28">
    @if ($klaar === 'aanvraag')
        <div class="rounded-2xl border border-primary/40 bg-primary/10 p-6 sm:p-8" role="status">
            <h3 class="font-sregs-display text-2xl sm:text-3xl text-white mb-2">Aanvraag <span class="text-primary">binnen.</span></h3>
            <p class="text-gray-200 text-lg mb-6">Bedankt, {{ $voornaam }}. Binnen twee werkdagen hoor je van Johan of je erbij bent.</p>
            <ol class="space-y-3 text-gray-200">
                @foreach (['Wij bekijken je aanvraag.', 'Je krijgt een mail met je plek en de link naar je bouwdossier.', 'Je vult je bouwdossier in, uiterlijk maandag 19 oktober. Daarna volgt de factuur.'] as $stap)
                    <li class="flex gap-3"><span class="font-mono text-primary">{{ $loop->iteration }}</span><span>{{ $stap }}</span></li>
                @endforeach
            </ol>
        </div>
    @elseif ($klaar === 'wachtlijst')
        <div class="rounded-2xl border border-primary/40 bg-primary/10 p-6 sm:p-8" role="status">
            <p class="text-gray-200 text-lg">Bedankt{{ $voornaam ? ', '.$voornaam : '' }}. Je staat op de lijst voor de volgende editie. Komt die er, dan hoor je het van ons.</p>
        </div>
    @elseif ($stand !== 'open')
        <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8">
            <p class="text-white text-lg mb-5">
                @if ($stand === 'vol') Alle tien keuringen zijn vergeven. Wil je bij een volgende editie zijn? Laat je e-mail achter.
                @else Aanvragen is gesloten. Wil je bij een volgende editie zijn? Laat je e-mail achter. @endif
            </p>
            <form wire:submit="wachtlijst" class="flex flex-col sm:flex-row gap-3">
                <div class="hidden" aria-hidden="true"><label>Laat dit veld leeg <input type="text" wire:model="hp" autocomplete="off" tabindex="-1"></label></div>
                <div class="flex-1">
                    <label for="wachtlijst-email" class="sr-only">E-mail</label>
                    <input id="wachtlijst-email" type="email" wire:model="wachtlijstEmail" required autocomplete="email" placeholder="naam@bedrijf.nl"
                        class="w-full rounded-lg bg-white/5 border-white/15 text-white placeholder-gray-500 px-3 py-3 focus:border-primary focus:ring-2 focus:ring-primary/30">
                    @error('wachtlijstEmail')<p class="mt-1.5 text-sm text-[#FF8A84]">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn-primary !rounded-lg px-6 py-3" wire:loading.attr="disabled">Zet me op de lijst</button>
            </form>
            @error('versturen')<p class="mt-3 text-sm text-[#FF8A84]">{{ $message }}</p>@enderror
            <p class="mt-3 text-sm text-gray-400">Zie de <a href="{{ route('privacy') }}" class="underline hover:text-white">privacyverklaring</a>.</p>
        </div>
    @else
        <form wire:submit="aanvragen" class="grid sm:grid-cols-2 gap-x-5 gap-y-6" novalidate>
            <div class="hidden" aria-hidden="true"><label>Laat dit veld leeg <input type="text" wire:model="hp" autocomplete="off" tabindex="-1"></label></div>

            @foreach (config('keuring.aanvraag') as $naam => $veld)
                @if ($naam === 'gebruikers')
                    <div class="sm:col-span-2 grid sm:grid-cols-[1fr_10rem] gap-x-5 gap-y-4 items-end">
                        <x-keuring.veld :naam="$naam" :veld="$veld" dark />
                        <x-keuring.veld naam="gebruikers_aantal" :veld="config('keuring.aanvraag.gebruikers_aantal')" dark />
                    </div>
                @elseif ($naam !== 'gebruikers_aantal')
                    <x-keuring.veld :naam="$naam" :veld="$veld" dark />
                @endif

                @if ($naam === 'medewerkers')
                    <p x-cloak x-show="$wire.antwoorden.medewerkers === 'Alleen ik'" class="sm:col-span-2 -mt-3 rounded-lg border border-[#F5933A]/50 bg-[#F5933A]/10 px-4 py-3 text-sm text-white" role="status">
                        Deze editie is voor ondernemers met een team. Je kunt je wel aanmelden voor de volgende editie.
                    </p>
                @endif
            @endforeach

            <div class="sm:col-span-2">
                <label class="flex items-start gap-3 text-sm text-white cursor-pointer">
                    <input type="checkbox" wire:model="akkoord" class="mt-0.5 h-5 w-5 rounded border-gray-400 text-primary focus:ring-primary" @error('akkoord') aria-describedby="akkoord-fout" @enderror>
                    <span>Ik ga akkoord dat Uteq en Growth AI mijn gegevens gebruiken voor deze keuring. <a href="{{ route('privacy') }}#keuring" target="_blank" class="underline hover:text-primary">Privacyverklaring</a><span aria-hidden="true"> *</span><span class="sr-only"> (verplicht)</span></span>
                </label>
                @error('akkoord')<p id="akkoord-fout" class="mt-1.5 text-sm text-[#FF8A84]">{{ $message }}</p>@enderror
            </div>

            <div class="sm:col-span-2">
                @if ($errors->any())
                    <p class="mb-3 text-sm text-[#FF8A84]" role="alert">{{ $errors->first('versturen') ?: 'Niet alles is goed ingevuld. Kijk de rode meldingen hierboven na.' }}</p>
                @endif
                <button type="submit" class="btn-primary !rounded-lg w-full sm:w-auto" wire:loading.attr="disabled" wire:target="aanvragen">
                    <span wire:loading.remove wire:target="aanvragen">Vraag een keuring aan</span>
                    <span wire:loading wire:target="aanvragen">Versturen…</span>
                </button>
            </div>
        </form>
    @endif
</div>
