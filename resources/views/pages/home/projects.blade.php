<div class="relative bg-secondary overflow-hidden" id="projecten">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/[0.04] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl px-8 py-24 lg:py-32 mx-auto relative">
        <div class="text-left mb-16">
            <span data-aos="fade-up" class="text-sm font-medium text-primary tracking-wide mb-4 block">
                Recent werk
            </span>
            <h2 data-aos="fade-up" data-aos-delay="50" class="font-sregs-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight max-w-2xl [text-wrap:balance]">Wat wij gebouwd hebben</h2>
        </div>

        {{-- Twee rijen, geen row-span --}}
        <div class="grid md:grid-cols-5 gap-4">

            {{-- Rij 1: CivilGrow (3) + Noorderinzicht (2) --}}
            <div data-aos="fade-up" class="project-card group md:col-span-3 rounded-2xl ring-1 ring-white/10 overflow-hidden flex flex-col bg-[#1a1a2e]">
                <div class="flex items-center gap-1.5 px-4 py-2.5 bg-[#1a1a2e] border-b border-white/5 shrink-0">
                    <span class="w-2 h-2 rounded-full bg-[#ff5f57]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#ffbd2e]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#28c840]"></span>
                    <span class="ml-2 text-[10px] text-gray-500 font-mono truncate">civilgrow.app/dashboard</span>
                </div>
                <div class="relative h-[280px] md:h-[320px] overflow-hidden">
                    <img src="{{ Vite::image('projects/civilgrow.webp') }}" alt="CivilGrow Planning Dashboard" class="project-parallax w-full h-full object-cover object-top">
                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-[#1a1a2e] to-transparent pointer-events-none"></div>
                </div>
                <div class="p-6 shrink-0">
                    <span class="text-xs font-mono tracking-widest uppercase text-primary">Planning Dashboard</span>
                    <h3 class="font-sregs-bold text-xl text-white mt-1">CivilGrow</h3>
                    <p class="text-gray-400 text-sm mt-2 leading-relaxed">Van losse Excel sheets naar een live planning dashboard. Het volledige contractoverzicht in real time, zonder handmatige updates.</p>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Dashboard</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Planning</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Maatwerk</span>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100" class="project-card group md:col-span-2 rounded-2xl ring-1 ring-white/10 overflow-hidden flex flex-col bg-[#1a1a2e]">
                <div class="flex items-center gap-1.5 px-4 py-2.5 bg-[#1a1a2e] border-b border-white/5 shrink-0">
                    <span class="w-2 h-2 rounded-full bg-[#ff5f57]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#ffbd2e]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#28c840]"></span>
                    <span class="ml-2 text-[10px] text-gray-500 font-mono truncate">app.noorderinzicht.nl</span>
                </div>
                <div class="relative h-[280px] md:h-[320px] overflow-hidden">
                    <img src="{{ Vite::image('projects/noorderinzicht.webp') }}" alt="Noorderinzicht Meeting Tool" class="project-parallax w-full h-full object-cover object-top">
                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-[#1a1a2e] to-transparent pointer-events-none"></div>
                </div>
                <div class="p-6 shrink-0">
                    <span class="text-xs font-mono tracking-widest uppercase text-primary">Meeting Tool</span>
                    <h3 class="font-sregs-bold text-xl text-white mt-1">Noorderinzicht</h3>
                    <p class="text-gray-400 text-sm mt-2 leading-relaxed">Vergadertranscripties automatisch verwerkt door AI die actiepunten eruit haalt.</p>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">AI</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Integratie</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Maatwerk</span>
                    </div>
                </div>
            </div>

            {{-- Rij 2: De Goede (2) + Biobase (3) --}}
            <div data-aos="fade-up" data-aos-delay="100" class="project-card group md:col-span-2 rounded-2xl ring-1 ring-white/10 overflow-hidden flex flex-col bg-[#1a1a2e]">
                <div class="flex items-center gap-1.5 px-4 py-2.5 bg-[#1a1a2e] border-b border-white/5 shrink-0">
                    <span class="w-2 h-2 rounded-full bg-[#ff5f57]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#ffbd2e]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#28c840]"></span>
                    <span class="ml-2 text-[10px] text-gray-500 font-mono truncate">portaal.degoede-advies.nl</span>
                </div>
                <div class="relative h-[280px] md:h-[320px] overflow-hidden">
                    <img src="{{ Vite::image('projects/degoede.webp') }}" alt="De Goede Advies Portaal" class="project-parallax w-full h-full object-cover object-top">
                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-[#1a1a2e] to-transparent pointer-events-none"></div>
                </div>
                <div class="p-6 shrink-0">
                    <span class="text-xs font-mono tracking-widest uppercase text-primary">Adviesportaal</span>
                    <h3 class="font-sregs-bold text-xl text-white mt-1">De Goede Advies</h3>
                    <p class="text-gray-400 text-sm mt-2 leading-relaxed">Centraal portaal voor financieel adviseurs. Dossierbeheer en klantoverzichten op een plek.</p>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Portaal</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Financieel</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Integratie</span>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" class="project-card group md:col-span-3 rounded-2xl ring-1 ring-white/10 overflow-hidden flex flex-col bg-[#1a1a2e]">
                <div class="flex items-center gap-1.5 px-4 py-2.5 bg-[#1a1a2e] border-b border-white/5 shrink-0">
                    <span class="w-2 h-2 rounded-full bg-[#ff5f57]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#ffbd2e]"></span>
                    <span class="w-2 h-2 rounded-full bg-[#28c840]"></span>
                    <span class="ml-2 text-[10px] text-gray-500 font-mono truncate">platform.biobase.nl/grs</span>
                </div>
                <div class="relative h-[280px] md:h-[320px] overflow-hidden">
                    <img src="{{ Vite::image('projects/biobase.webp') }}" alt="Biobase GRS Platform" class="project-parallax w-full h-full object-cover object-top">
                    <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-[#1a1a2e] to-transparent pointer-events-none"></div>
                </div>
                <div class="p-6 shrink-0">
                    <span class="text-xs font-mono tracking-widest uppercase text-primary">GRS Platform</span>
                    <h3 class="font-sregs-bold text-xl text-white mt-1">Biobase</h3>
                    <p class="text-gray-400 text-sm mt-2 leading-relaxed">Een compleet ERP systeem voor de groengas en biogassector. Feedstockbeheer, massabalanstracking en duurzaamheidsrapportages.</p>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Platform</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Energie</span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">ERP</span>
                    </div>
                </div>
            </div>

        </div>

        <div data-aos="fade-up" class="mt-10 text-center md:text-left">
            <a href="{{ route('projecten') }}" class="btn-text text-lg">
                <span class="border-b border-primary/40">Bekijk alle projecten</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</div>
