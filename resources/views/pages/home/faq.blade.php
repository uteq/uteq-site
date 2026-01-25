<div class="relative bg-white py-20 lg:py-28 overflow-hidden" id="faq">
    <div class="max-w-4xl mx-auto px-8">
        <div class="text-center mb-16">
            <p data-aos="fade-up" class="text-primary font-semibold uppercase tracking-widest text-sm mb-4">Veelgestelde vragen</p>
            <h2 data-aos="fade-up" class="font-sregs-bold text-3xl md:text-4xl text-secondary leading-tight">
                Logische twijfels, eerlijke antwoorden
            </h2>
        </div>

        <div data-aos="fade-up" class="space-y-4" x-data="{ open: null }">
            {{-- Vraag 1: Solo risico --}}
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    @click="open = open === 1 ? null : 1"
                    class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 transition-colors"
                >
                    <span class="font-sregs-bold text-lg text-secondary">Wat als je ziek wordt of te druk bent?</span>
                    <svg
                        class="w-5 h-5 text-primary flex-shrink-0 transition-transform duration-200"
                        :class="{ 'rotate-180': open === 1 }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 1" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Terechte vraag. Drie dingen neem ik mee:
                    </p>
                    <ul class="mt-3 space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span><strong>Volledige documentatie</strong> bij oplevering. Elke andere Laravel-developer kan het overnemen.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span><strong>Open source stack</strong> (Laravel, PHP, MySQL). Geen proprietary code waar je aan vast zit.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span><strong>12 jaar track record</strong>. Klanten van het eerste uur werken nog steeds met me.</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Vraag 2: ROI zekerheid --}}
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    @click="open = open === 2 ? null : 2"
                    class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 transition-colors"
                >
                    <span class="font-sregs-bold text-lg text-secondary">Hoe weet ik dat dit voor mij werkt?</span>
                    <svg
                        class="w-5 h-5 text-primary flex-shrink-0 transition-transform duration-200"
                        :class="{ 'rotate-180': open === 2 }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 2" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Vooraf rekenen we samen uit wat het oplevert. Concreet: hoeveel uur bespaart het, wat kost die tijd nu, en wanneer is de investering terugverdiend.
                    </p>
                    <p class="text-gray-600 leading-relaxed mt-3">
                        Als de businesscase niet klopt, zeg ik dat eerlijk. Ik heb liever geen project dan een ontevreden klant.
                    </p>
                    <p class="text-gray-600 leading-relaxed mt-3">
                        <strong>Extra zekerheid:</strong> niet tevreden na 4 weken? Geld terug. Geen discussie.
                    </p>
                </div>
            </div>

            {{-- Vraag 3: Wat krijg ik --}}
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    @click="open = open === 3 ? null : 3"
                    class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 transition-colors"
                >
                    <span class="font-sregs-bold text-lg text-secondary">Wat krijg ik precies opgeleverd?</span>
                    <svg
                        class="w-5 h-5 text-primary flex-shrink-0 transition-transform duration-200"
                        :class="{ 'rotate-180': open === 3 }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 3" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed mb-3">
                        Een werkende webapplicatie, specifiek voor jouw bedrijf. Concreet:
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Dashboard met real-time overzicht van je processen</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Automatische verwerking van data (bonnen, facturen, meldingen)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Koppelingen met je bestaande systemen (Excel, boekhoudpakket, etc.)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Volledige broncode en documentatie</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Training voor jou en je team</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Vraag 4: Onderhoud --}}
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    @click="open = open === 4 ? null : 4"
                    class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 transition-colors"
                >
                    <span class="font-sregs-bold text-lg text-secondary">Hoe zit het met onderhoud na oplevering?</span>
                    <svg
                        class="w-5 h-5 text-primary flex-shrink-0 transition-transform duration-200"
                        :class="{ 'rotate-180': open === 4 }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 4" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Na oplevering draait de software zelfstandig. Je bent niet afhankelijk van mij voor dagelijks gebruik.
                    </p>
                    <p class="text-gray-600 leading-relaxed mt-3">
                        Voor updates, uitbreidingen of support kun je een onderhoudscontract afsluiten, maar dat is optioneel. De meeste klanten bellen me 2-3x per jaar voor kleine aanpassingen.
                    </p>
                    <p class="text-gray-600 leading-relaxed mt-3">
                        <strong>Hosting?</strong> Ik regel dat voor je, of je zet het op je eigen server. Jouw keuze.
                    </p>
                </div>
            </div>

            {{-- Vraag 5: Waarom geen SaaS --}}
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    @click="open = open === 5 ? null : 5"
                    class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 transition-colors"
                >
                    <span class="font-sregs-bold text-lg text-secondary">Waarom maatwerk en geen SaaS-pakket?</span>
                    <svg
                        class="w-5 h-5 text-primary flex-shrink-0 transition-transform duration-200"
                        :class="{ 'rotate-180': open === 5 }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 5" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        SaaS is prima voor standaard problemen. Maar jouw bedrijfsprocessen zijn niet standaard.
                    </p>
                    <p class="text-gray-600 leading-relaxed mt-3">
                        <strong>Het verschil:</strong>
                    </p>
                    <div class="mt-3 grid md:grid-cols-2 gap-4">
                        <div class="bg-red-50 rounded-xl p-4">
                            <p class="font-semibold text-red-800 mb-2">SaaS</p>
                            <ul class="text-sm text-red-700 space-y-1">
                                <li>&bull; Maandelijkse kosten (voor altijd)</li>
                                <li>&bull; Jij past je aan de software aan</li>
                                <li>&bull; Leverancier kan stoppen/prijzen verhogen</li>
                                <li>&bull; Data staat bij een ander</li>
                            </ul>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4">
                            <p class="font-semibold text-green-800 mb-2">Maatwerk</p>
                            <ul class="text-sm text-green-700 space-y-1">
                                <li>&bull; Eenmalige investering</li>
                                <li>&bull; Software past zich aan jou aan</li>
                                <li>&bull; 100% jouw eigendom, voor altijd</li>
                                <li>&bull; Volledige controle over je data</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Vraag 6: Prijs --}}
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button
                    @click="open = open === 6 ? null : 6"
                    class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 hover:bg-gray-50 transition-colors"
                >
                    <span class="font-sregs-bold text-lg text-secondary">Waarom kost het &euro;20-50k?</span>
                    <svg
                        class="w-5 h-5 text-primary flex-shrink-0 transition-transform duration-200"
                        :class="{ 'rotate-180': open === 6 }"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 6" x-collapse class="px-6 pb-5">
                    <p class="text-gray-600 leading-relaxed">
                        Eerlijk: maatwerksoftware is niet goedkoop. Maar vergelijk het eens:
                    </p>
                    <ul class="mt-3 space-y-2 text-gray-600">
                        <li class="flex items-start gap-2">
                            <span class="text-primary font-bold">&bull;</span>
                            <span>Een administratief medewerker kost &euro;50.000+ per jaar</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-primary font-bold">&bull;</span>
                            <span>SaaS-pakketten kosten &euro;500-2000 per maand (&euro;60.000+ over 5 jaar)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-primary font-bold">&bull;</span>
                            <span>Fouten en vertragingen kosten je klanten en reputatie</span>
                        </li>
                    </ul>
                    <p class="text-gray-600 leading-relaxed mt-3">
                        De investering is eenmalig. Wat het je bespaart, verdien je elk jaar opnieuw.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
