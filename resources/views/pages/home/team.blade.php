<div class="relative bg-white py-24 lg:py-32 overflow-hidden" id="team">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-primary/[0.03] to-transparent pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-8 relative">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium tracking-wide mb-4">
                Wie wij zijn
            </span>
            <h2 data-aos="fade-up" data-aos-delay="50" class="text-3xl md:text-4xl font-sregs-bold text-secondary leading-tight">
                De mensen achter UTEQ
            </h2>
        </div>

        {{-- Nathan centraal en prominent --}}
        <div data-aos="fade-up" data-aos-delay="100" class="max-w-2xl mx-auto mb-16">
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8">
                <div class="flex-shrink-0">
                    <div class="w-32 h-32 rounded-2xl bg-gray-200 overflow-hidden">
                        <img src="{{ Vite::image('avatar.webp') }}" alt="Nathan Jansen" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="text-center sm:text-left">
                    <h3 class="text-2xl font-semibold text-secondary mb-1">Nathan Jansen</h3>
                    <p class="text-primary font-medium mb-3">AI Business Architect</p>
                    <a href="https://nathanjansen.nl" target="_blank" class="inline-flex items-center gap-1 text-sm text-gray-400 hover:text-primary transition-colors mb-4">
                        nathanjansen.nl
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                    </a>
                    <p class="text-gray-600 leading-relaxed">Ontwerpt en bouwt. 10+ jaar ervaring in maatwerk software voor zakelijke dienstverleners. Van probleem naar werkende oplossing, met oog voor wat het bedrijf echt nodig heeft.</p>
                </div>
            </div>
        </div>

        {{-- Partners netwerk --}}
        <div data-aos="fade-up" data-aos-delay="200">
            <p class="text-center text-gray-500 text-sm uppercase tracking-widest mb-8">Wij werken samen met specialisten</p>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-3xl mx-auto">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 text-center hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                    <div class="w-12 h-12 rounded-full bg-primary/10 mx-auto mb-4 flex items-center justify-center">
                        <span class="text-primary font-bold text-lg">P</span>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary mb-1">Phantomium</h3>
                    <p class="text-primary text-sm font-medium mb-2">Development</p>
                    <p class="text-gray-500 text-sm">Technische implementatie voor complexe projecten</p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white p-6 text-center hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                    <div class="w-12 h-12 rounded-full bg-primary/10 mx-auto mb-4 flex items-center justify-center">
                        <span class="text-primary font-bold text-lg">N</span>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary mb-1">Noorderinzicht</h3>
                    <p class="text-primary text-sm font-medium mb-2">Design & UX</p>
                    <p class="text-gray-500 text-sm">Visueel ontwerp en gebruikerservaring</p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white p-6 text-center hover:shadow-lg hover:border-primary/20 transition-all duration-300 sm:col-span-2 md:col-span-1">
                    <div class="w-12 h-12 rounded-full bg-gray-100 mx-auto mb-4 flex items-center justify-center">
                        <span class="text-gray-400 font-bold text-lg">+</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-400 mb-1">Meer partners</h3>
                    <p class="text-gray-400 text-sm font-medium mb-2">Groeiend netwerk</p>
                    <p class="text-gray-400 text-sm">Specialisten voor elk project</p>
                </div>
            </div>
        </div>
    </div>
</div>
