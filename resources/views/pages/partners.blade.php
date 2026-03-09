<x-layouts.app title="Partners" metaDescription="UTEQ werkt samen met specialisten in development, design en UX. Ontdek onze partners.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="font-sregs-bold text-4xl md:text-5xl text-white tracking-wide leading-tight mb-4">Onze partners</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Wij werken samen met specialisten die ons aanvullen. Zo krijg je voor elk onderdeel van je project de juiste expertise.</p>
        </div>
    </div>

    <div class="bg-white py-24 px-8">
        <div class="max-w-4xl mx-auto space-y-12">

            {{-- Phantomium --}}
            <div data-aos="fade-up" class="rounded-2xl border border-gray-200 p-8 hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start gap-6">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                            <span class="text-primary font-bold text-2xl">P</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <h2 class="text-2xl font-semibold text-secondary">Phantomium</h2>
                            <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-0.5 text-xs font-medium">Development</span>
                        </div>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Phantomium is onze vaste ontwikkelpartner voor technisch complexe projecten. Waar extra development-capaciteit nodig is, schakelen wij Phantomium in. Samen zorgen we ervoor dat ook grotere trajecten snel en solide worden opgeleverd.
                        </p>
                        <a href="https://iisatmedia.com" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-primary transition-colors">
                            iisatmedia.com
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Noorderinzicht --}}
            <div data-aos="fade-up" data-aos-delay="100" class="rounded-2xl border border-gray-200 p-8 hover:shadow-lg hover:border-primary/20 transition-all duration-300">
                <div class="flex flex-col sm:flex-row items-start gap-6">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                            <span class="text-primary font-bold text-2xl">N</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <h2 class="text-2xl font-semibold text-secondary">Noorderinzicht</h2>
                            <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-0.5 text-xs font-medium">Design & UX</span>
                        </div>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Noorderinzicht verzorgt het visuele ontwerp en de gebruikerservaring van onze projecten. Van wireframes tot pixel-perfect design: zij zorgen ervoor dat software niet alleen goed werkt, maar ook prettig in gebruik is.
                        </p>
                        <a href="https://noorderinzicht.nl" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-primary transition-colors">
                            noorderinzicht.nl
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('pages.home.footer')

</x-layouts.app>
