<div class="relative bg-[#F9F8F8] w-full py-24 lg:py-32 overflow-hidden" id="werkwijze">
    <div class="absolute top-0 left-0 w-1/3 h-full bg-gradient-to-r from-primary/[0.03] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-8 relative">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium tracking-wide mb-4">
                Hoe wij werken
            </span>
            <h2 data-aos="fade-up" data-aos-delay="50" class="text-3xl md:text-4xl lg:text-5xl font-sregs-bold text-secondary leading-tight">
                Van probleem naar werkende software in drie stappen
            </h2>
        </div>

        {{-- Horizontale tijdlijn --}}
        <div class="relative mb-16">
            {{-- Verbindingslijn (desktop) --}}
            <div class="hidden md:block absolute top-8 left-[16.67%] right-[16.67%] h-0.5 bg-primary/20"></div>

            <div class="grid md:grid-cols-3 gap-12 md:gap-8">
                <div data-aos="fade-up" data-aos-delay="100" class="relative text-center">
                    <div class="relative z-10 w-16 h-16 rounded-full bg-primary/10 border-2 border-primary flex items-center justify-center mx-auto mb-6">
                        <span class="text-primary font-bold text-xl">1</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-secondary">Kennismaking</h3>
                    <span class="inline-block text-xs font-semibold text-primary bg-primary/10 rounded-full px-3 py-1 mb-3">GRATIS</span>
                    <p class="text-gray-600 leading-relaxed">Vertel ons waar je tegenaan loopt. Wij luisteren en denken mee. Vrijblijvend.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="relative text-center">
                    <div class="relative z-10 w-16 h-16 rounded-full bg-primary/10 border-2 border-primary flex items-center justify-center mx-auto mb-6">
                        <span class="text-primary font-bold text-xl">2</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-secondary">Bouwplan</h3>
                    <p class="text-gray-600 leading-relaxed">Wij maken een plan met vaste prijs. Past het niet? Dan stop je daar, zonder verdere verplichting.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300" class="relative text-center">
                    <div class="relative z-10 w-16 h-16 rounded-full bg-primary/10 border-2 border-primary flex items-center justify-center mx-auto mb-6">
                        <span class="text-primary font-bold text-xl">3</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-secondary">Bouw</h3>
                    <p class="text-gray-600 leading-relaxed">Wij bouwen. Jij test en geeft feedback. Elke week een update.</p>
                </div>
            </div>
        </div>

        <div data-aos="fade-up" data-aos-delay="350" class="text-center">
            <x-contact-form-modal title="Vraag een kennismakingsgesprek aan">
                <button class="rounded-xl bg-primary px-8 py-4 md:px-10 md:py-5 md:text-lg font-semibold text-secondary shadow-sm hover:bg-primary/90 hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
                    Vraag een kennismakingsgesprek aan
                </button>
            </x-contact-form-modal>
            <p class="text-gray-500 text-sm mt-3">Eerste gesprek altijd gratis</p>
        </div>
    </div>
</div>
