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
                        <img src="{{ Vite::image('projects/noorderinzicht.webp') }}" alt="Noorderinzicht Sales Platform" class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-col gap-3">
                        <p class="uppercase tracking-wider text-xs font-semibold text-primary">Sales Platform</p>
                        <p class="font-sregs-bold text-2xl md:text-3xl text-white">Noorderinzicht</p>
                        <p class="leading-relaxed text-gray-300 pb-2">
                            Een compleet verkoopplatform voor energieadvies. Klanten doorlopen zelfstandig het adviestraject, van intake tot offerte. Adviseurs hebben overzicht over alle lopende trajecten.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Platform</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Sales</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Energie</span>
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

            {{-- Bergman Postma --}}
            <div data-aos="fade-up" data-aos-delay="250" class="flex flex-col md:flex-row-reverse gap-8 items-center">
                <div class="md:w-1/2">
                    <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl">
                        <div class="aspect-video bg-gradient-to-br from-primary/10 via-white/5 to-white/[0.02] flex items-center justify-center relative">
                            {{-- Abstract UI wireframe shapes --}}
                            <svg class="absolute inset-0 w-full h-full opacity-[0.07]" viewBox="0 0 640 360" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="40" y="30" width="560" height="40" rx="6" fill="white"/>
                                <rect x="40" y="90" width="170" height="240" rx="8" fill="white"/>
                                <rect x="230" y="90" width="370" height="110" rx="8" fill="white"/>
                                <rect x="230" y="220" width="175" height="110" rx="8" fill="white"/>
                                <rect x="425" y="220" width="175" height="110" rx="8" fill="white"/>
                            </svg>
                            <span class="text-white/20 text-sm font-medium tracking-wide relative z-10">Bergman Postma</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-col gap-3">
                        <p class="uppercase tracking-wider text-xs font-semibold text-primary">CRM & Automatisering</p>
                        <p class="font-sregs-bold text-2xl md:text-3xl text-white">Bergman Postma</p>
                        <p class="leading-relaxed text-gray-300 pb-2">
                            Van papieren dossiers naar een digitaal CRM-systeem. Automatische PDF-verwerking en gesprekstranscriptie. Het systeem neemt handmatige stappen over, zodat het team zich kan richten op klantcontact.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">CRM</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">Automatisering</span>
                            <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-gray-300">AI</span>
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
