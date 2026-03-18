<div class="relative bg-secondary w-full py-24 lg:py-32 overflow-hidden" id="werkwijze">

    <div class="max-w-6xl mx-auto px-8 relative">

        {{-- Header --}}
        <div class="mb-16">
            <span data-aos="fade-up" class="font-mono text-xs tracking-widest text-primary uppercase mb-5 block">
                Hoe wij werken
            </span>
            <h2 data-aos="fade-up" data-aos-delay="50" class="text-3xl md:text-4xl lg:text-5xl font-sregs-bold text-white leading-tight max-w-2xl [text-wrap:balance]">
                Van probleem naar werkende software in drie stappen
            </h2>
        </div>

        {{-- Drie stappen als asymmetrische cards --}}
        <div class="grid md:grid-cols-5 gap-6">

            {{-- Stap 1: compact --}}
            <div data-aos="fade-up" class="card-tilt md:col-span-2 rounded-2xl border border-white/10 bg-white/[0.03] p-8 md:p-10 hover:border-primary/20 transition-colors duration-500">
                <span class="text-2xl font-medium text-primary/25 leading-none block mb-6">01</span>
                <div class="flex items-center gap-3 mb-3">
                    <h3 class="font-sregs-bold text-2xl text-white">Kennismaking</h3>
                    <span class="text-xs font-semibold text-primary bg-primary/10 rounded-full px-3 py-1 tracking-wide">GRATIS</span>
                </div>
                <p class="text-gray-400 leading-relaxed">Vertel ons waar je tegenaan loopt. Wij luisteren en denken mee. Vrijblijvend.</p>
            </div>

            {{-- Stap 2: breder --}}
            <div data-aos="fade-up" data-aos-delay="80" class="card-tilt md:col-span-3 rounded-2xl border border-white/10 bg-white/[0.03] p-8 md:p-10 hover:border-primary/20 transition-colors duration-500">
                <span class="text-2xl font-medium text-primary/25 leading-none block mb-6">02</span>
                <h3 class="font-sregs-bold text-2xl text-white mb-3">Bouwplan</h3>
                <p class="text-gray-400 leading-relaxed">Wij maken een plan met vaste prijs. Past het niet? Dan stop je daar, zonder verdere verplichting.</p>
            </div>

            {{-- Stap 3: full-width, horizontale layout --}}
            <div data-aos="fade-up" data-aos-delay="160" class="card-tilt md:col-span-5 rounded-2xl border border-white/10 bg-white/[0.06] p-8 md:p-10 hover:border-primary/20 transition-colors duration-500">
                <div class="flex flex-col md:flex-row md:items-center gap-6">
                    <span class="text-2xl font-medium text-primary/25 leading-none block md:mr-4">03</span>
                    <div>
                        <h3 class="font-sregs-bold text-2xl text-white mb-3">Bouw</h3>
                        <p class="text-gray-400 leading-relaxed max-w-xl">Wij bouwen. Jij test en geeft feedback. Elke week een update.</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- CTA-balk --}}
        <div data-aos="fade-up" class="mt-16 pt-10 border-t border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
            <div>
                <p class="text-white font-sregs text-lg mb-1">Klaar om te starten?</p>
                <p class="text-gray-500 text-sm">Eerste gesprek altijd gratis en vrijblijvend.</p>
            </div>
            <x-contact-form-modal title="Vraag een kennismakingsgesprek aan">
                <button class="btn-primary shrink-0 px-8 py-4">
                    Vraag een kennismakingsgesprek aan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </x-contact-form-modal>
        </div>

    </div>
</div>
