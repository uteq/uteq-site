{{-- Telt af tot het formulier vanzelf sluit. Alleen zichtbaar zolang aanvragen kan. --}}
@php
    $tot = \Illuminate\Support\Carbon::parse(config('keuring.aanvragen_tot'), 'Europe/Amsterdam');
    $rest = max(0, now()->diffInSeconds($tot, false));
    $delen = ['dagen' => intdiv($rest, 86400), 'uur' => intdiv($rest % 86400, 3600), 'min' => intdiv($rest % 3600, 60), 'sec' => $rest % 60];
@endphp

@if (\App\Models\Keuring::stand() === 'open')
    <div {{ $attributes }}
        x-data="{
            tot: {{ $tot->getTimestamp() * 1000 }},
            d: {{ json_encode($delen) }},
            tik() {
                const s = Math.max(0, Math.floor((this.tot - Date.now()) / 1000));
                this.d = { dagen: Math.floor(s / 86400), uur: Math.floor(s % 86400 / 3600), min: Math.floor(s % 3600 / 60), sec: s % 60 };
            },
        }"
        x-init="tik(); setInterval(() => tik(), 1000)">
        <p class="font-mono text-xs tracking-[0.2em] uppercase text-primary mb-3">Aanvragen sluit over</p>
        <p class="sr-only">Je kunt aanvragen tot en met woensdag 14 oktober, 23:59 uur.</p>
        <div class="flex gap-2 sm:gap-3" aria-hidden="true">
            @foreach ($delen as $eenheid => $waarde)
                <div class="w-16 sm:w-20 rounded-lg border border-white/15 bg-white/[0.04] py-2 text-center">
                    <span class="block font-mono text-2xl sm:text-3xl font-semibold text-white tabular-nums" x-text="String(d.{{ $eenheid }}).padStart(2, '0')">{{ str_pad($waarde, 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="block text-xs text-gray-400">{{ $eenheid }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endif
