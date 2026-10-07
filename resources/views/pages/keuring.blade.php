@php
    use App\Models\Keuring;
    [$kopRegel1, $kopRegel2, $kopGroen] = Keuring::kop();
    $over = Keuring::plaatsenOver();
    $label = 'font-mono text-xs tracking-[0.2em] uppercase';
    $h2 = 'font-sregs-display text-3xl sm:text-4xl lg:text-5xl leading-tight';
@endphp

<x-layouts.app
    :nav="false"
    fullTitle="Bouwkundige keuring voor je AI · 28 oktober · Uteq"
    metaDescription="Jij ziet de gevel, wij zien het fundament. Twee specialisten keuren wat jij met AI hebt gebouwd of ingericht. Lokaal55 Sneek, 28 oktober, €99 excl. btw per persoon."
    :ogImage="asset('images/keuring/og-image.png')"
    brandSuffix="met Growth AI"
>

    {{-- 1. Hero --}}
    <section class="relative bg-secondary px-6 pt-32 pb-16 sm:pt-40 lg:pb-24 overflow-hidden">
        <div class="relative max-w-6xl mx-auto grid lg:grid-cols-[1fr_1.05fr] gap-12 lg:gap-14 items-center">
            <div>
                <p class="{{ $label }} text-primary mb-6">Bouwkundige keuring · wo 28 oktober · Lokaal55 Sneek</p>
                <h1 class="font-sregs-display text-4xl sm:text-5xl lg:text-6xl text-white leading-[1.08] mb-6 [text-wrap:balance]">
                    @if ($kopRegel1){{ $kopRegel1 }}<br>@endif
                    {{ $kopRegel2 }} <span class="text-primary">{{ $kopGroen }}</span>
                </h1>
                <p class="text-lg sm:text-xl text-gray-300 leading-relaxed mb-8 max-w-xl">Twee specialisten keuren wat jij met AI hebt gebouwd of ingericht: een app, een automatisering of een eigen GPT. Wat zien zij dat jij mist?</p>
                <a href="#aanvragen" class="btn-primary !rounded-lg px-8 py-4 text-lg">
                    Vraag een keuring aan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>
                <p class="text-sm text-gray-400 mt-4">10 keuringen · €99 excl. btw per persoon · geldt als voucher</p>
                <p class="mt-6 inline-flex items-center gap-2 rounded-full border border-primary/40 px-4 py-1.5 text-sm text-white">
                    <span class="h-2 w-2 rounded-full bg-primary" aria-hidden="true"></span>
                    Nog {{ $over }} van de 10 keuringen
                </p>
                <x-keuring.timer class="mt-8" />
            </div>

            {{-- Beeld: wat jij ziet / wat wij zien --}}
            <figure class="grid grid-cols-2 gap-3 sm:gap-6" aria-label="Links een net planbord zoals jij het ziet. Rechts hetzelfde planbord als bouwtekening, met vier bevindingen.">
                <div>
                    <p class="{{ $label }} text-gray-400 mb-3 text-[10px] sm:text-xs">Wat jij ziet</p>
                    <div class="rounded-2xl bg-white p-4 sm:p-6 h-full">
                        <p class="font-sregs-display text-xl sm:text-3xl text-secondary">Planbord</p>
                        <p class="text-xs sm:text-sm text-gray-500 mb-3 sm:mb-4">Week 41 · 14 monteurs</p>
                        @foreach (['Ma' => 'w-3/5', 'Di' => 'w-4/5', 'Wo' => 'w-1/2', 'Do' => 'w-2/3', 'Vr' => 'w-3/5'] as $dag => $breedte)
                            <div class="flex items-center gap-2 sm:gap-3 py-2 sm:py-2.5 border-b border-gray-200">
                                <span class="w-6 sm:w-8 text-xs sm:text-base font-medium text-secondary">{{ $dag }}</span>
                                <span class="flex-1"><span class="block h-2 sm:h-3 rounded-full bg-primary {{ $breedte }}"></span></span>
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-primary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        @endforeach
                        <span class="mt-4 block rounded-lg bg-secondary py-2 sm:py-3 text-center text-xs sm:text-base font-semibold text-white">Nieuwe klus</span>
                    </div>
                </div>
                <div>
                    <p class="{{ $label }} text-primary mb-3 text-[10px] sm:text-xs">Wat wij zien</p>
                    <div class="relative rounded-2xl border-2 border-primary/40 p-4 sm:p-6 h-full" style="background-color:#22232f;background-image:linear-gradient(rgba(62,232,140,.07) 1px,transparent 1px),linear-gradient(90deg,rgba(62,232,140,.07) 1px,transparent 1px);background-size:20px 20px">
                        <p class="font-sregs-display text-xl sm:text-3xl text-gray-300">Planbord</p>
                        <p class="text-xs sm:text-sm text-gray-500 mb-3 sm:mb-4">Week 41 · 14 monteurs</p>
                        @foreach (['Ma' => 'w-3/5', 'Di' => 'w-4/5', 'Wo' => 'w-1/2', 'Do' => 'w-2/3', 'Vr' => 'w-3/5'] as $dag => $breedte)
                            <div class="flex items-center gap-2 sm:gap-3 py-2 sm:py-2.5 border-b border-dashed border-primary/25">
                                <span class="w-6 sm:w-8 text-xs sm:text-base text-gray-400">{{ $dag }}</span>
                                <span class="flex-1"><span class="block h-2 sm:h-3 rounded-full border border-dashed border-primary/50 {{ $breedte }}"></span></span>
                                <span class="w-3 h-3 sm:w-4 sm:h-4 border border-gray-500 rounded-sm" aria-hidden="true"></span>
                            </div>
                        @endforeach
                        <span class="mt-4 block rounded-lg border border-dashed border-primary/40 py-2 sm:py-3 text-center text-xs sm:text-base text-gray-500">Nieuwe klus</span>

                        @foreach ([['top-[18%]', '#FF5F57', 1, 'Klantdata leesbaar zonder inlog'], ['top-[45%]', '#FF5F57', 2, 'Sleutel staat in de code'], ['top-[72%]', '#F5933A', 3, 'Back-up nooit teruggezet'], ['top-[90%]', '#F5933A', 4, 'Alleen jij snapt hoe het werkt']] as [$top, $kleur, $nr, $tekst])
                            <div class="absolute {{ $top }} right-1 sm:-right-4 flex items-center gap-1.5 sm:gap-2">
                                <span class="flex h-5 w-5 sm:h-8 sm:w-8 shrink-0 items-center justify-center rounded-full text-[10px] sm:text-sm font-bold text-white" style="background: {{ $kleur }}">{{ $nr }}</span>
                                <span class="hidden sm:block rounded-lg bg-white px-2.5 py-1.5 text-xs lg:text-sm font-semibold text-secondary shadow-lg whitespace-nowrap">{{ $tekst }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <figcaption class="col-span-2 sm:hidden mt-4 space-y-1.5 text-sm text-gray-300">
                    @foreach (['Klantdata leesbaar zonder inlog', 'Sleutel staat in de code', 'Back-up nooit teruggezet', 'Alleen jij snapt hoe het werkt'] as $tekst)
                        <p><span class="font-mono {{ $loop->index < 2 ? 'text-[#FF5F57]' : 'text-[#F5933A]' }}">{{ $loop->iteration }}</span> {{ $tekst }}</p>
                    @endforeach
                </figcaption>
            </figure>
        </div>
    </section>

    {{-- 2. Herken je dit? --}}
    <section class="bg-sand px-6 py-20 lg:py-28">
        <div class="max-w-6xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-6 max-w-3xl">Het werkt. Maar staat het ook <span class="text-primary-dark">stevig?</span></h2>
            <p class="text-lg text-gray-700 leading-relaxed max-w-3xl mb-12">Je hebt zelf iets gebouwd en je team gebruikt het elke dag. Mooi. Maar kan iedereen met de link bij je klantgegevens? Staan er sleutels in de code? Weet iemand anders hoe het werkt? En wat als het morgen omvalt?</p>
            <div class="grid md:grid-cols-3 gap-5">
                @foreach (['Klantgegevens open voor iedereen met de link.', 'Geen versiebeheer. Elke wijziging staat meteen live.', 'Back-ups die nooit zijn teruggezet.'] as $kaart)
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#FF5F57] text-white font-bold mb-4" aria-hidden="true">!</span>
                        <p class="text-lg font-semibold text-secondary">{{ $kaart }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. Zes keurpunten --}}
    <section class="bg-white px-6 py-20 lg:py-28">
        <div class="max-w-6xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-12">Wij keuren op zes <span class="text-primary-dark">punten.</span></h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-14">
                @foreach ([
                    ['Veiligheid en privacy', 'Sleutels, wie bij welke data kan, klantgegevens en AVG.', 'Nathan'],
                    ['Fundament', 'Hoe de data is opgebouwd en of het kan groeien.', 'Nathan'],
                    ['Onderhoud', 'Versiebeheer, afspraken, en of een ander verder kan.', 'Nathan'],
                    ['Betrouwbaarheid', 'Back-ups, foutafhandeling, en wat er gebeurt als het stukgaat.', 'Nathan'],
                    ['Gebruik', 'Uitstraling, workflow, en of een nieuwe collega het zonder uitleg snapt.', 'Johan'],
                    ['Waarde', 'Lost het iets op, wordt het gebruikt, en wat is de volgende stap?', 'Johan'],
                ] as [$titel, $zin, $wie])
                    <div @class(['relative rounded-2xl border p-6 sm:p-8', 'border-primary border-2 bg-primary/5' => $loop->first, 'border-gray-200' => ! $loop->first])>
                        @if ($loop->first)
                            <span class="absolute -top-3 left-6 rounded-full bg-primary px-3 py-0.5 font-mono text-xs uppercase tracking-wider text-secondary">punt 1</span>
                        @endif
                        <p class="font-sregs-display text-4xl text-gray-300 mb-3" aria-hidden="true">{{ $loop->iteration }}</p>
                        <h3 class="font-sregs-display text-xl text-secondary mb-2"><span class="sr-only">{{ $loop->iteration }}. </span>{{ $titel }}</h3>
                        <p class="text-gray-600 mb-4">{{ $zin }}</p>
                        <p class="font-mono text-xs uppercase tracking-wider text-gray-500">Keurt: {{ $wie }}</p>
                    </div>
                @endforeach
            </div>

            <p class="{{ $label }} text-gray-600 mb-4">De uitslag</p>
            <div class="flex flex-wrap gap-3 sm:gap-5 mb-6">
                @foreach (['GOEDGEKEURD' => '#1F9D5C', 'VERBOUWEN' => '#C2620E', 'SLOPEN' => '#D93A33'] as $stempel => $kleur)
                    <span class="inline-block -rotate-2 rounded-md border-[3px] px-4 py-2 font-mono text-base sm:text-xl font-bold tracking-[0.15em]" style="color: {{ $kleur }}; border-color: {{ $kleur }}">{{ $stempel }}</span>
                @endforeach
            </div>
            <p class="text-lg text-gray-700">Slopen hoeft bijna nooit. Met een goed fundament kun je verbouwen.</p>
        </div>
    </section>

    {{-- 4. Zo werkt het --}}
    <section class="bg-secondary px-6 py-20 lg:py-28">
        <div class="max-w-6xl mx-auto">
            <p class="{{ $label }} text-primary mb-4">Zo werkt het</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ([
                    ['Vraag een keuring aan.', 'Twee minuten. Kan tot en met woensdag 14 oktober.'],
                    ['Wij kiezen er tien.', 'Binnen twee werkdagen hoor je of je erbij bent. Dan krijg je de link naar je bouwdossier.'],
                    ['Vul je bouwdossier in.', 'Uiterlijk maandag 19 oktober, in ongeveer tien minuten: met hoeveel personen je komt, je factuurgegevens, wat je hebt gebouwd, en hoe wij het kunnen bekijken.'],
                    ['Hoor de uitslag op 28 oktober.', 'Je neemt je keuringsrapport mee naar huis. In november volgt een nabespreking.'],
                ] as [$titel, $tekst])
                    <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8">
                        <p class="font-sregs-display text-4xl text-primary mb-4">{{ $loop->iteration }}</p>
                        <h3 class="font-sregs-display text-xl text-white mb-2">{{ $titel }}</h3>
                        <p class="text-gray-300">{{ $tekst }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Wat je krijgt --}}
    <section class="bg-white px-6 py-20 lg:py-28">
        <div class="max-w-3xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-10">Wat je <span class="text-primary-dark">krijgt.</span></h2>
            <ul class="space-y-4">
                @foreach ([
                    'Een keuring van je AI-oplossing op zes punten',
                    'Een persoonlijk bericht als we een lek vinden, vóór de avond',
                    'Je keuringsrapport: één A4 met uitslag en de volgende stap',
                    'Een plek op de avond, met bites en drinks. Een collega mag mee, ook voor €99',
                    'De checklist met de zes punten, bruikbaar in elke tool',
                    'Een nabespreking van 30 minuten in november',
                    'Je €99 als voucher, verrekend bij een opdracht vóór 1 december 2026',
                ] as $punt)
                    <li class="flex gap-4 text-lg text-gray-800">
                        <svg class="mt-1 h-6 w-6 shrink-0 text-primary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        {{ $punt }}
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- 6. De avond --}}
    <section class="bg-sand px-6 py-20 lg:py-28">
        <div class="max-w-3xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-10">De <span class="text-primary-dark">avond.</span></h2>
            <table class="w-full text-left">
                <caption class="sr-only">Programma van woensdag 28 oktober</caption>
                <thead class="sr-only"><tr><th scope="col">Tijd</th><th scope="col">Onderdeel</th></tr></thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ([
                        '17:30' => 'Inloop, bites en drinks',
                        '18:00' => 'Welkom en spelregels',
                        '18:15' => 'De inspectie: wat we zagen bij alle tien',
                        '18:45' => 'Live keuringen. De zaal stemt mee',
                        '19:15' => 'Pauze',
                        '19:35' => 'Zo bouw je wel: fundament, afspraken en werkwijze',
                        '20:05' => 'Live keuringen, ronde 2',
                        '20:35' => 'Bouwtafels: ondernemers helpen elkaar',
                        '21:05' => 'Oplevering: je rapport in een envelop',
                    ] as $tijd => $onderdeel)
                        <tr>
                            <th scope="row" class="py-4 pr-6 font-mono text-secondary font-semibold align-top w-20">{{ $tijd }}</th>
                            <td class="py-4 text-lg text-gray-800">{{ $onderdeel }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- 7. Veilig gekeurd --}}
    <section class="bg-white px-6 py-20 lg:py-24">
        <div class="max-w-3xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-6">We kraken <span class="text-primary-dark">niets.</span></h2>
            <p class="text-lg text-gray-700 leading-relaxed">Je laat ons zien wat je hebt gebouwd: met een uitnodiging als gebruiker, een link of schermafbeeldingen. Je deelt geen wachtwoorden. Vinden we een lek, dan hoor jij het vóór de avond, en als enige. Op het scherm komen alleen patronen, nooit jouw lek. En jij kiest hoe je gekeurd wordt: alleen in je eigen rapport, anoniem op het scherm, of live met naam.</p>
        </div>
    </section>

    {{-- 8. Wie keuren er --}}
    <section class="bg-sand px-6 py-20 lg:py-28">
        <div class="max-w-4xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-12">Wie keuren <span class="text-primary-dark">er?</span></h2>
            <div class="grid sm:grid-cols-2 gap-10">
                @foreach ([
                    ['nathan-jansen.jpg', 'Nathan Jansen', 'Uteq', 'Keurt veiligheid, fundament, onderhoud en betrouwbaarheid.'],
                    ['johan-oenema.jpg', 'Johan Oenema', 'Growth AI', 'Keurt gebruik, workflow en waarde.'],
                ] as [$foto, $naam, $bedrijf, $zin])
                    <div class="flex items-center gap-5">
                        <img src="{{ asset('images/keuring/'.$foto) }}" alt="Portret van {{ $naam }}" width="112" height="112" loading="lazy" decoding="async" class="h-24 w-24 sm:h-28 sm:w-28 shrink-0 rounded-full object-cover grayscale">
                        <div>
                            <p class="font-sregs-display text-xl text-secondary">{{ $naam }} · {{ $bedrijf }}</p>
                            <p class="text-gray-700 mt-1">{{ $zin }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="mt-10 text-lg text-gray-700">Samen bouwen ze bedrijfssoftware voor het MKB.</p>
        </div>
    </section>

    {{-- 9. Praktisch --}}
    <section class="bg-white px-6 py-20 lg:py-28">
        <div class="max-w-6xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-10"><span class="text-primary-dark">Praktisch.</span></h2>
            <dl class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                @foreach ([
                    'Wanneer' => 'wo 28 oktober, 17:30 tot 21:30',
                    'Waar' => 'Lokaal55, Oude Oppenhuizerweg 55, Sneek',
                    'Prijs' => '€99 excl. btw per persoon, geldt als voucher',
                    'Keuringen' => '10',
                    'Aanvragen' => 'tot en met wo 14 oktober',
                ] as $wat => $waarde)
                    <div class="rounded-2xl border border-gray-200 p-5">
                        <dt class="{{ $label }} text-gray-600 mb-2">{{ $wat }}</dt>
                        <dd class="text-secondary font-semibold">{{ $waarde }}</dd>
                    </div>
                @endforeach
            </dl>
            <p class="text-gray-700">Voor ondernemers met een team. Deze editie is niet voor zzp'ers en hobbyprojecten.</p>
        </div>
    </section>

    {{-- 10. Vragen --}}
    <section class="bg-white px-6 pb-20 lg:pb-28">
        <div class="max-w-3xl mx-auto">
            <h2 class="{{ $h2 }} text-secondary mb-8"><span class="text-primary-dark">Vragen.</span></h2>
            <div class="divide-y divide-gray-200 border-y border-gray-200">
                @foreach ([
                    'Is dit een pentest?' => 'Nee. We bekijken wat je hebt gebouwd als gewone gebruiker, of via wat je ons laat zien. Als je dat wilt, kijken we mee in de code. We proberen niets te kraken.',
                    'Ik heb geen app, maar een automatisering of een eigen GPT. Kan ik meedoen?' => 'Ja. Alles wat je met AI hebt gebouwd of ingericht en wat in je bedrijf echt gebruikt wordt, kunnen we keuren. Alleen ChatGPT gebruiken voor losse teksten valt erbuiten.',
                    'Wat kost het?' => '€99 excl. btw per persoon. Kom je met een collega, dan is dat €198 excl. btw. Elk ticket is een voucher: neem je vóór 1 december 2026 iets bij ons af, dan verrekenen we het. Je betaalt pas na je toelating.',
                    'Wat moet ik insturen?' => 'Na je toelating vul je je bouwdossier in: met hoeveel personen je komt, je factuurgegevens, wat je oplossing doet, een link of een uitnodiging als dat kan, en een schermopname of schermafbeeldingen. Uiterlijk maandag 19 oktober.',
                    'Word ik voor de hele zaal afgebrand?' => 'Alleen als je dat zelf wilt. Je kiest: alleen in je eigen rapport, anoniem op het scherm, of live met naam.',
                    "Ik ben zzp'er. Kan ik meedoen?" => 'Deze editie is voor ondernemers met een team. Laat je gegevens achter, dan hoor je het als er een volgende editie komt.',
                ] as $vraag => $antwoord)
                    <details class="group py-5">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-lg font-semibold text-secondary focus-visible:outline-2 focus-visible:outline-primary [&::-webkit-details-marker]:hidden">
                            {{ $vraag }}
                            <svg class="h-5 w-5 shrink-0 transition-transform group-open:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-width="2" d="M12 5v14M5 12h14"/></svg>
                        </summary>
                        <p class="mt-3 text-gray-700 leading-relaxed">{{ $antwoord }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 11. Aanvraagformulier --}}
    <section id="aanvragen" class="bg-secondary px-6 py-20 lg:py-28 scroll-mt-20">
        <div class="max-w-3xl mx-auto">
            <h2 class="{{ $h2 }} text-white mb-4">Vraag een keuring <span class="text-primary">aan.</span></h2>
            <p class="text-lg text-gray-300 mb-10">Twee minuten. Wij kiezen er tien. Binnen twee werkdagen hoor je of je erbij bent.</p>
            <x-keuring.timer class="mb-10" />
            <livewire:keuring-aanvraag />
        </div>
    </section>

    {{-- 12. Footer --}}
    <footer class="bg-secondary border-t border-white/[0.07] px-6 py-16">
        <div class="max-w-6xl mx-auto text-center">
            <p class="font-sregs-display text-3xl sm:text-4xl text-white mb-10">Zelf gebouwd met AI. Gekeurd door <span class="text-primary">vakmensen.</span></p>
            <div class="flex items-center justify-center gap-3">
                <a href="{{ route('home') }}" aria-label="Uteq"><x-uteq-logo class="h-8 w-auto" /></a>
                <span class="text-gray-300">met Growth AI</span>
            </div>
            <p class="mt-8 text-xs text-gray-400"><a href="{{ route('privacy') }}" class="hover:text-white">Privacy</a></p>
        </div>
    </footer>

</x-layouts.app>
