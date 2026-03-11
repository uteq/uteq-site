<div class="relative bg-secondary w-full py-24 lg:py-32 overflow-hidden" id="werkwijze">
    {{-- Dot grid — spiegelt de hero, maar links --}}
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true"
         style="background-image: radial-gradient(circle at 1px 1px, rgba(1,220,130,0.08) 1px, transparent 0); background-size: 28px 28px; -webkit-mask-image: radial-gradient(ellipse 50% 120% at 15% 50%, black 10%, transparent 70%); mask-image: radial-gradient(ellipse 50% 120% at 15% 50%, black 10%, transparent 70%);"></div>

    <div class="max-w-6xl mx-auto px-8 relative">

        {{-- Header — links uitgelijnd --}}
        <div class="mb-20">
            <span data-aos="fade-up" class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium tracking-wide mb-5">
                Hoe wij werken
            </span>
            <h2 data-aos="fade-up" data-aos-delay="50" class="text-3xl md:text-4xl lg:text-5xl font-sregs-bold text-white leading-tight max-w-2xl">
                Van probleem naar werkende software in drie stappen
            </h2>
        </div>

        {{-- Steps — drie kolommen met verticale scheidingslijnen --}}
        <div class="grid md:grid-cols-3 md:divide-x md:divide-white/10">

            {{-- Stap 1 --}}
            <div data-aos="fade-up" data-aos-delay="100" class="relative overflow-hidden pb-12 md:pb-0 md:pr-12 border-b border-white/10 md:border-b-0">
                {{-- Ghost nummer --}}
                <div class="absolute -bottom-4 right-0 font-extrabold leading-none text-white pointer-events-none select-none" style="font-size: clamp(100px, 14vw, 160px); opacity: 0.04;" aria-hidden="true">01</div>

                <div class="relative">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="font-mono text-xs tracking-[0.2em] text-primary">01</span>
                        <div class="h-px flex-1 bg-primary/25"></div>
                        <span class="text-xs font-semibold text-primary bg-primary/10 rounded-full px-3 py-1 tracking-wide">GRATIS</span>
                    </div>
                    <h3 class="font-sregs-bold text-2xl text-white mb-4">Kennismaking</h3>
                    <p class="text-gray-400 leading-relaxed">Vertel ons waar je tegenaan loopt. Wij luisteren en denken mee. Vrijblijvend.</p>
                </div>
            </div>

            {{-- Stap 2 --}}
            <div data-aos="fade-up" data-aos-delay="200" class="relative overflow-hidden py-12 md:py-0 md:px-12 border-b border-white/10 md:border-b-0">
                <div class="absolute -bottom-4 right-0 font-extrabold leading-none text-white pointer-events-none select-none" style="font-size: clamp(100px, 14vw, 160px); opacity: 0.04;" aria-hidden="true">02</div>

                <div class="relative">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="font-mono text-xs tracking-[0.2em] text-primary">02</span>
                        <div class="h-px flex-1 bg-primary/25"></div>
                    </div>
                    <h3 class="font-sregs-bold text-2xl text-white mb-4">Bouwplan</h3>
                    <p class="text-gray-400 leading-relaxed">Wij maken een plan met vaste prijs. Past het niet? Dan stop je daar, zonder verdere verplichting.</p>
                </div>
            </div>

            {{-- Stap 3 --}}
            <div data-aos="fade-up" data-aos-delay="300" class="relative overflow-hidden pt-12 md:pt-0 md:pl-12">
                <div class="absolute -bottom-4 right-0 font-extrabold leading-none text-white pointer-events-none select-none" style="font-size: clamp(100px, 14vw, 160px); opacity: 0.04;" aria-hidden="true">03</div>

                <div class="relative">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="font-mono text-xs tracking-[0.2em] text-primary">03</span>
                        <div class="h-px flex-1 bg-primary/25"></div>
                    </div>
                    <h3 class="font-sregs-bold text-2xl text-white mb-4">Bouw</h3>
                    <p class="text-gray-400 leading-relaxed">Wij bouwen. Jij test en geeft feedback. Elke week een update.</p>
                </div>
            </div>
        </div>

        {{-- CTA-balk — tekst links, knop rechts --}}
        <div data-aos="fade-up" data-aos-delay="350" class="mt-16 pt-10 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
            <div>
                <p class="text-white font-sregs text-lg mb-1">Klaar om te starten?</p>
                <p class="text-gray-500 text-sm">Eerste gesprek altijd gratis en vrijblijvend.</p>
            </div>
            <x-contact-form-modal title="Vraag een kennismakingsgesprek aan">
                <button class="btn-shimmer shrink-0 rounded-xl bg-primary px-8 py-4 font-semibold text-secondary hover:bg-primary/90 hover:shadow-[0_0_32px_rgba(1,220,130,0.4)] hover:scale-[1.02] transition-all duration-300">
                    Vraag een kennismakingsgesprek aan
                </button>
            </x-contact-form-modal>
        </div>

    </div>
</div>
