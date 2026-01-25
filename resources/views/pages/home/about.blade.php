<div class="relative bg-[#FEFAF2] py-20 lg:py-28 overflow-hidden" id="over-mij">
    <div class="max-w-6xl mx-auto px-8 relative">
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-center">
            <div class="lg:w-1/2 order-2 lg:order-1" data-aos="fade-up">
                <p class="text-primary font-semibold uppercase tracking-widest text-sm mb-4">Over mij</p>
                <h2 class="font-sregs-bold text-3xl md:text-4xl text-secondary mb-6">Nathan Jansen</h2>

                {{-- Stats balk --}}
                <div class="grid grid-cols-3 gap-4 mb-8 py-6 border-y border-gray-200">
                    <div class="text-center">
                        <p class="text-3xl font-sregs-bold text-primary">{{ date('Y') - 2014 }}</p>
                        <p class="text-sm text-gray-500">jaar ervaring</p>
                    </div>
                    <div class="text-center border-x border-gray-200">
                        <p class="text-3xl font-sregs-bold text-primary">15+</p>
                        <p class="text-sm text-gray-500">bedrijven geholpen</p>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-sregs-bold text-primary">100%</p>
                        <p class="text-sm text-gray-500">terugkerende klanten</p>
                    </div>
                </div>

                <div class="space-y-4 text-gray-600 leading-relaxed text-lg">
                    <p>Bouwt operationele software voor MKB-bedrijven in Noord-Nederland. Geen team van 40 man, geen projectmanagers, geen verkooppraatjes.</p>
                    <p class="text-secondary font-medium">Ik zit zelf aan tafel, ik bouw zelf, en ik lever zelf op.</p>
                    <p>Mijn klanten houden mijn nummer in hun telefoon. Niet die van een servicedesk. Klanten van het eerste uur bellen me nog steeds.</p>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <p class="text-gray-500 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Sneek, Friesland
                    </p>
                    <a href="https://www.linkedin.com/in/nathanjansen/" target="_blank" rel="noopener" class="text-gray-500 hover:text-primary transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        LinkedIn
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 order-1 lg:order-2" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-br from-primary/30 to-primary/5 rounded-3xl blur-2xl"></div>
                    <img class="relative w-full max-w-md mx-auto rounded-2xl shadow-2xl" src="{{ Vite::image('nathan.webp') }}" alt="Nathan Jansen - Software Developer" width="457" height="457" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
