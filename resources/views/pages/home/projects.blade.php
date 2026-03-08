<div class="relative bg-secondary overflow-hidden" id="projecten">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/[0.05] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl px-8 py-24 lg:py-32 mx-auto relative">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-flex items-center rounded-full bg-primary/20 text-primary px-3 py-1 text-sm font-medium tracking-wide mb-4">
                Recent werk
            </span>
            <h2 data-aos="fade-up" data-aos-delay="50" class="font-sregs-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight">Wat wij gebouwd hebben</h2>
        </div>

        <div class="flex flex-col gap-16">

            {{-- CivilGrow --}}
            <div data-aos="fade-up" data-aos-delay="100" class="flex flex-col md:flex-row gap-8 items-center">
                <div class="md:w-1/2">
                    <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl">
                        <img src="{{ Vite::image('projects/civilgrow.webp') }}" alt="CivilGrow Planning Dashboard" class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-col gap-3">
                        <p class="uppercase tracking-wider text-xs font-semibold text-primary">Planning Dashboard</p>
                        <p class="font-sregs-bold text-2xl md:text-3xl text-white">CivilGrow</p>
                        <p class="leading-relaxed text-gray-300 pb-2">
                            Van losse Excel-sheets naar een live planning dashboard. Het volledige contractoverzicht in real-time, zonder handmatige updates. Het team ziet direct welke contracten lopen, wat de status is en waar actie nodig is.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Dashboard</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Planning</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Maatwerk</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Noorderinzicht --}}
            <div data-aos="fade-up" data-aos-delay="150" class="flex flex-col md:flex-row-reverse gap-8 items-center">
                <div class="md:w-1/2">
                    <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl">
                        <img src="{{ Vite::image('projects/noorderinzicht.webp') }}" alt="Noorderinzicht Meeting Tool" class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-col gap-3">
                        <p class="uppercase tracking-wider text-xs font-semibold text-primary">Meeting Tool</p>
                        <p class="font-sregs-bold text-2xl md:text-3xl text-white">Noorderinzicht</p>
                        <p class="leading-relaxed text-gray-300 pb-2">
                            Van vergadering naar actie, zonder uittypen. Vergadertranscripties worden automatisch verwerkt door AI die de actiepunten eruit haalt. Het team reviewt, keurt goed en stuurt ze met een klik door naar Asana.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">AI</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Integratie</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Maatwerk</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- De Goede Advies --}}
            <div data-aos="fade-up" data-aos-delay="200" class="flex flex-col md:flex-row gap-8 items-center">
                <div class="md:w-1/2">
                    <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl">
                        <img src="{{ Vite::image('projects/degoede.webp') }}" alt="De Goede Advies Portaal" class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-col gap-3">
                        <p class="uppercase tracking-wider text-xs font-semibold text-primary">Adviesportaal</p>
                        <p class="font-sregs-bold text-2xl md:text-3xl text-white">De Goede Advies</p>
                        <p class="leading-relaxed text-gray-300 pb-2">
                            Centraal portaal voor financieel adviseurs. Dossierbeheer, klantoverzichten en omzetrapportages op een plek. Zo hoeven adviseurs minder te zoeken en houden ze meer tijd over voor hun klanten.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Portaal</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Financieel</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Integratie</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Biobase --}}
            <div data-aos="fade-up" data-aos-delay="250" class="flex flex-col md:flex-row-reverse gap-8 items-center">
                <div class="md:w-1/2">
                    <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl">
                        <img src="{{ Vite::image('projects/biobase.webp') }}" alt="Biobase GRS Platform" class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-col gap-3">
                        <p class="uppercase tracking-wider text-xs font-semibold text-primary">GRS Platform</p>
                        <p class="font-sregs-bold text-2xl md:text-3xl text-white">Biobase</p>
                        <p class="leading-relaxed text-gray-300 pb-2">
                            Een compleet ERP-systeem voor de groengas- en biogassector. Feedstockbeheer, massabalanstracking en duurzaamheidsrapportages in een platform. Installatie-eigenaren houden grip op compliance en zien direct waar ze staan.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Platform</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Energie</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">ERP</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div data-aos="fade-up" class="text-center mt-12">
            <a href="{{ route('projecten') }}" class="inline-flex items-center gap-2 text-primary font-medium hover:text-primary/80 transition-colors text-lg">
                <span class="border-b border-primary/40">Bekijk alle projecten</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</div>
