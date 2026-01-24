<div class="relative py-32 bg-floral-white overflow-hidden" id="services">
    {{-- Subtle decorative gradient --}}
    <div class="absolute top-0 left-0 w-1/3 h-full bg-gradient-to-r from-primary/[0.03] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-8 lg:px-6 relative">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium tracking-wide mb-4">
                Wat wij doen
            </span>
            <div class="text-4xl md:text-5xl font-sregs-bold text-secondary leading-tight">
                Onze Diensten
            </div>
        </div>

        <div class="flex flex-col gap-10">

            <div data-aos="fade-up" data-aos-delay="100" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex max-w-xl lg:max-w-full mx-auto lg:mx-0 flex-col lg:flex-row gap-8 items-center">
                    <div class="lg:w-1/2 order-2 lg:order-2 flex flex-col gap-4 my-auto">
                        <div class="font-sregs-bold text-2xl md:text-3xl text-secondary">SaaS- Webontwikkeling</div>
                        <div class="leading-relaxed text-gray-600">
                            Wij zijn er om jouw visie werkelijkheid te maken.
                            Met onze webontwikkelingsvaardigheden zorgen we samen voor
                            een gebruiksvriendelijke SaaS-oplossing die aansluit bij wat jij voor ogen hebt.
                        </div>
                        <div>
                            <x-contact-form-modal title="Maak een afspraak">
                                <button class="rounded-xl bg-primary px-8 py-4 md:px-10 md:py-4 md:text-lg font-semibold text-secondary shadow-sm hover:bg-primary/90 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 inline-flex gap-4 items-center">
                                    Maak een afspraak
                                </button>
                            </x-contact-form-modal>
                        </div>
                    </div>
                    <div class="lg:w-1/2 order-1 lg:order-1">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="{{ Vite::image('service-saas.webp') }}" alt="SaaS webontwikkeling">
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="150" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex max-w-xl lg:max-w-full mx-auto lg:mx-0 flex-col lg:flex-row-reverse gap-8 items-center">
                    <div class="lg:w-1/2 flex flex-col gap-4 my-auto">
                        <div class="font-sregs-bold text-2xl md:text-3xl text-secondary">API integraties</div>
                        <div class="leading-relaxed text-gray-600">Met API-integraties zorgen we ervoor dat je systemen met elkaar kunnen 'praten'. Jouw data komt op de juiste plek. Laat ons de technische puzzelstukken voor je bedrijf in elkaar zetten. </div>
                        <div>
                            <x-contact-form-modal title="Maak een afspraak">
                                <button class="rounded-xl bg-primary px-8 py-4 md:px-10 md:py-4 font-semibold text-secondary shadow-sm hover:bg-primary/90 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 inline-flex gap-4 items-center">
                                    Maak een afspraak
                                </button>
                            </x-contact-form-modal>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="{{ Vite::image('service-api.webp') }}" alt="API integraties">
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex max-w-xl lg:max-w-full mx-auto lg:mx-0 flex-col lg:flex-row gap-8 items-center">
                    <div class="lg:w-1/2 order-2 lg:order-2 flex flex-col gap-4 my-auto">
                        <div class="font-sregs-bold text-2xl md:text-3xl text-secondary">Maatwerkoplossingen</div>
                        <div class="leading-relaxed text-gray-600">
                            Met bijvoorbeeld een maatwerk notificatiesystemen is jouw bedrijf altijd goed geïnformeerd is over cruciale gebeurtenissen en veranderingen.<br><br>
                            Of het nu gaat om belangrijke meldingen van klanten, essentiële statusupdates van je systemen of andere waardevolle informatie,
                            onze notificatiesystemen zijn er om je bedrijf soepel te laten draaien door de juiste informatie op het juiste moment te leveren.</div>
                        <div>
                            <x-contact-form-modal title="Maak een afspraak">
                                <button class="rounded-xl bg-primary px-8 py-4 md:px-10 md:py-4 font-semibold text-secondary shadow-sm hover:bg-primary/90 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 inline-flex gap-4 items-center">
                                    Maak een afspraak
                                </button>
                            </x-contact-form-modal>
                        </div>
                    </div>
                    <div class="lg:w-1/2 order-1 lg:order-1">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="{{ Vite::image('service-notifications.webp') }}" alt="Maatwerkoplossingen">
                    </div>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="250" class="group rounded-2xl border border-gray-200 bg-white p-6 md:p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                <div class="flex max-w-xl lg:max-w-full mx-auto lg:mx-0 flex-col lg:flex-row-reverse gap-8 items-center">
                    <div class="lg:w-1/2 flex flex-col gap-4 my-auto">
                        <div class="font-sregs-bold text-2xl md:text-3xl text-secondary">Consultancy</div>
                        <div class="leading-relaxed text-gray-600">
                            Uteq is jouw partner in groei, we nemen graag de tijd om naar je jou te luisteren.
                            Samen bieden we advies dat precies past bij jouw unieke visie en doelen.
                            We geloven in het belang van langdurige relaties, en dat betekent dat we niet alleen de uitdagingen aanpakken,
                            maar ook de unieke kansen onderzoeken die jouw bedrijf onderscheiden.<br><br>
                            Bij ons ben je geen klant; je bent een partner.
                            Jouw succes is ons succes, en samen werken we aan een mooie toekomst voor jouw onderneming.</div>
                        <div>
                            <x-contact-form-modal title="Maak een afspraak">
                                <button class="rounded-xl bg-primary px-8 py-4 md:px-10 md:py-4 font-semibold text-secondary shadow-sm hover:bg-primary/90 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 inline-flex gap-4 items-center">
                                    Maak een afspraak
                                </button>
                            </x-contact-form-modal>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img class="rounded-2xl ring-1 ring-black/5 shadow-lg w-full" src="{{ Vite::image('service-consultancy.webp') }}" alt="Consultancy">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
