<div class="relative bg-[#F9F8F8] overflow-hidden" id="projects">
    {{-- Subtle decorative gradient --}}
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/[0.03] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl px-8 py-32 mx-auto relative">
        <span data-aos="fade-up" class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium tracking-wide mb-4">
            Portfolio
        </span>
        <div data-aos="fade-up" data-aos-delay="50" class="font-sregs-bold text-4xl md:text-5xl text-secondary pb-16 leading-tight">Onze Projecten</div>

        <div class="flex flex-col gap-10">
            {{-- Project 1: BioValue --}}
            <div data-aos="fade-up" data-aos-delay="100" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="<?php echo e(Vite::image('uteq-adminpanelen.png')); ?>" alt="BioValue adminpaneel">
                    </div>
                    <div class="md:w-1/2">
                        <div class="flex flex-col gap-3">
                            <p class="uppercase tracking-wider text-xs font-semibold text-primary/80">Adminpaneel</p>
                            <p class="font-sregs-bold text-2xl md:text-3xl text-secondary">BioValue</p>
                            <p class="leading-relaxed text-gray-600 pb-2">
                                Voor BioValue hebben wij een adminpaneel ontworpen en gebouwd.
                                Waarin de klant bonnen kan uploaden die vervolgens worden verwerkt in een balans.
                                De toepassingen die we daar onder andere hebben verwerkt:
                                Invoer bonnen, Invoer facturen, Koppel facturen aan bonnen,
                                Vrachtplanning, Massabalans, Weekoverzichten en Metingen.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Programming</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Design UX/UI</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Mobile App Design</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Rapportage</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Project 2: Storingsdienst (alternating) --}}
            <div data-aos="fade-up" data-aos-delay="150" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col md:flex-row-reverse gap-8 items-center">
                    <div class="md:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="<?php echo e(Vite::image('uteq-telegram.png')); ?>" alt="Storingsdienst BioValue">
                    </div>
                    <div class="md:w-1/2">
                        <div class="flex flex-col gap-3">
                            <p class="uppercase tracking-wider text-xs font-semibold text-primary/80">Koppeling</p>
                            <p class="font-sregs-bold text-2xl md:text-3xl text-secondary">Storingsdienst BioValue</p>
                            <p class="leading-relaxed text-gray-600 pb-2">
                                Voor BioValue hebben wij een koppeling gemaakt waardoor de storingen van de installaties
                                automatisch worden verwerkt naar Telegram. Wanneer een van hun installaties niet draait
                                worden ze gebeld.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Programming</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Koppeling</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Telegram</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Project 3: Wallable --}}
            <div data-aos="fade-up" data-aos-delay="200" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="<?php echo e(Vite::image('uteq-wallable.png')); ?>" alt="Wallable poster generator">
                    </div>
                    <div class="md:w-1/2">
                        <div class="flex flex-col gap-3">
                            <p class="uppercase tracking-wider text-xs font-semibold text-primary/80">Poster generator</p>
                            <p class="font-sregs-bold text-2xl md:text-3xl text-secondary">Wallable</p>
                            <p class="leading-relaxed text-gray-600 pb-2">
                                Voor Wallable hebben wij een poster generator gemaakt. Wallable had zelf al een poster builder gemaakt.
                                Waarmee de klanten van Wallable zelf posters hun posters maakten.
                                Wij koppelden dat met WooCommerce en maakte daarna een koppeling met de poster generator.
                                De Poster Generator zet de posters klaar in PDF formaat en stuurt deze door naar een map om te printen.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Programming</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Koppeling</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">WooCommerce</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Project 4: All Under Control (alternating) --}}
            <div data-aos="fade-up" data-aos-delay="250" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col md:flex-row-reverse gap-8 items-center">
                    <div class="md:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="<?php echo e(Vite::image('uteq-auc.png')); ?>" alt="All Under Control paneel">
                    </div>
                    <div class="md:w-1/2">
                        <div class="flex flex-col gap-3">
                            <p class="uppercase tracking-wider text-xs font-semibold text-primary/80">Dashboards</p>
                            <p class="font-sregs-bold text-2xl md:text-3xl text-secondary">All Under Control paneel</p>
                            <p class="leading-relaxed text-gray-600 pb-2">
                                Een overzichtelijk dashboard dat de status van vergistingsprocessen bijhoudt.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Design UX/UI</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Mobile App Design</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Programming</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Project 5: Festival Ticket-systemen --}}
            <div data-aos="fade-up" data-aos-delay="300" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="<?php echo e(Vite::image('uteq-optocht.webp')); ?>" alt="Festival ticket-systeem">
                    </div>
                    <div class="md:w-1/2">
                        <div class="flex flex-col gap-3">
                            <p class="uppercase tracking-wider text-xs font-semibold text-primary/80">Ticketsysteem</p>
                            <p class="font-sregs-bold text-2xl md:text-3xl text-secondary">Festival Ticket-systemen</p>
                            <p class="leading-relaxed text-gray-600 pb-2">
                                Voor de Allegorische Optocht van VVV St.Nicolaasga hebben wij een ticket systeem ontworpen en gebouwd.
                                Dit systeem genereert een QR code die bij binnenkomst van het evenement gescand wordt.
                                De vrijwilligers die de QR codes scannen gebruiken onze web app om gekochte tickets te zien en te valideren.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Design UX/UI</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Mobile App Design</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Programming</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Project 6: Safesent (alternating) --}}
            <div data-aos="fade-up" data-aos-delay="350" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col md:flex-row-reverse gap-8 items-center">
                    <div class="md:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="<?php echo e(Vite::image('dienst6.webp')); ?>" alt="Safesent">
                    </div>
                    <div class="md:w-1/2">
                        <div class="flex flex-col gap-3">
                            <p class="uppercase tracking-wider text-xs font-semibold text-primary/80">SaaS</p>
                            <p class="font-sregs-bold text-2xl md:text-3xl text-secondary">Safesent</p>
                            <p class="leading-relaxed text-gray-600 pb-2">
                                We hebben een gratis web applicatie ontworpen en gebouwd voor het versturen van privacy gevoelige bestanden naar je accountant.
                            </p>
                            <a href="https://safesent.nl" class="inline-flex gap-2 items-center text-primary font-medium hover:text-primary/80 transition-colors" target="_blank">
                                <span class="border-b border-primary/40">Bekijk safesent.nl</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Programming</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Design UX/UI</span>
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">Mobile App Design</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
