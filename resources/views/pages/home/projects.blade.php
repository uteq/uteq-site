<div class="relative bg-gray-50 overflow-hidden" id="resultaten">
    <div class="max-w-6xl px-8 py-20 lg:py-28 mx-auto relative">
        <div class="mb-16">
            <p data-aos="fade-up" class="text-primary font-semibold uppercase tracking-widest text-sm mb-4">Resultaten</p>
            <h2 data-aos="fade-up" class="font-sregs-bold text-3xl md:text-4xl text-secondary leading-tight mb-4">
                Wat het oplevert
            </h2>
            <p data-aos="fade-up" class="text-gray-600 text-lg max-w-2xl">
                Concrete resultaten van MKB-bedrijven die hun operationele processen hebben geautomatiseerd.
            </p>
        </div>

        <div class="space-y-8">
            {{-- Case 1: BioValue Administratie --}}
            <div data-aos="fade-up" class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-500 overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2">
                        <img class="w-full h-64 lg:h-full object-cover" src="{{ Vite::image('uteq-adminpanelen.webp') }}" alt="BioValue adminpaneel" width="990" height="684" loading="lazy">
                    </div>
                    <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                        <p class="text-primary font-semibold text-sm mb-2">BioValue &middot; Vergistingsinstallaties</p>
                        <h3 class="font-sregs-bold text-2xl md:text-3xl text-secondary mb-4">Team verwerkt nu 3x zoveel orders</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">BioValue verwerkte bonnen, facturen en massabalansen met de hand. Nu doet de software het tikwerk en kan het team zich focussen op klantcontact en groei.</p>
                        <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-100">
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">&euro;150k</p>
                                <p class="text-sm text-gray-500">bespaard per jaar</p>
                            </div>
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">3 mnd</p>
                                <p class="text-sm text-gray-500">terugverdiend</p>
                            </div>
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">0</p>
                                <p class="text-sm text-gray-500">fouten per maand</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Case 2: BioValue Storingsdienst --}}
            <div data-aos="fade-up" class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-500 overflow-hidden">
                <div class="flex flex-col lg:flex-row-reverse">
                    <div class="lg:w-1/2">
                        <img class="w-full h-64 lg:h-full object-cover" src="{{ Vite::image('uteq-telegram.webp') }}" alt="Storingsdienst BioValue" width="990" height="684" loading="lazy">
                    </div>
                    <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                        <p class="text-primary font-semibold text-sm mb-2">BioValue &middot; Monitoring</p>
                        <h3 class="font-sregs-bold text-2xl md:text-3xl text-secondary mb-4">Reactietijd: van 45 naar 2 minuten</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Vergistingsinstallaties stonden soms 45 minuten stil voor iemand het merkte. Nu detecteert het systeem de storing en stuurt direct een melding. Automatisch.</p>
                        <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-100">
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">95%</p>
                                <p class="text-sm text-gray-500">snellere reactie</p>
                            </div>
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">&euro;40k</p>
                                <p class="text-sm text-gray-500">stilstand voorkomen</p>
                            </div>
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">24/7</p>
                                <p class="text-sm text-gray-500">automatische bewaking</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Case 3: All Under Control --}}
            <div data-aos="fade-up" class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-shadow duration-500 overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2">
                        <img class="w-full h-64 lg:h-full object-cover" src="{{ Vite::image('uteq-auc.webp') }}" alt="All Under Control dashboard" width="990" height="684" loading="lazy">
                    </div>
                    <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                        <p class="text-primary font-semibold text-sm mb-2">All Under Control &middot; Procesmonitoring</p>
                        <h3 class="font-sregs-bold text-2xl md:text-3xl text-secondary mb-4">Handmatige checks vervangen door live dashboard</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">Vergistingsprocessen werden gecontroleerd met rondjes lopen en pen en papier. Nu staat alles real-time op &eacute;&eacute;n scherm. Afwijkingen vallen direct op.</p>
                        <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-100">
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">6</p>
                                <p class="text-sm text-gray-500">Excel-bestanden weg</p>
                            </div>
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">10 uur</p>
                                <p class="text-sm text-gray-500">per week bespaard</p>
                            </div>
                            <div>
                                <p class="text-2xl font-sregs-bold text-primary">Real-time</p>
                                <p class="text-sm text-gray-500">inzicht in processen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
