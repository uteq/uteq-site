<div class="relative bg-secondary px-8 overflow-hidden" id="footer">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/[0.08] to-transparent pointer-events-none"></div>

    <div class="relative max-w-4xl py-20 lg:py-28 mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-white mb-4 text-3xl md:text-4xl lg:text-5xl font-sregs-bold leading-tight">
                Klaar om te automatiseren?
            </h2>
            <p class="text-gray-400 text-lg">
                Plan een vrijblijvend gesprek van 30 minuten.
            </p>
        </div>

        <div class="flex justify-center mb-16">
            <x-contact-form-modal title="Plan een gesprek">
                <button class="group rounded-full bg-primary px-8 py-4 md:px-10 md:py-5 md:text-lg font-semibold text-secondary shadow-lg shadow-primary/25 hover:shadow-primary/40 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 inline-flex gap-3 items-center">
                    Plan een gesprek
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3"/></svg>
                </button>
            </x-contact-form-modal>
        </div>

        <div class="border-t border-white/10 pt-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-gray-400 text-sm">
                <div class="flex flex-wrap justify-center md:justify-start gap-x-6 gap-y-2">
                    <a href="mailto:info@uteq.nl" class="hover:text-primary transition-colors">info@uteq.nl</a>
                    <a href="tel:+31614032722" class="hover:text-primary transition-colors">+31 6 14032722</a>
                </div>
                <div class="flex flex-wrap justify-center md:justify-end gap-x-6 gap-y-2">
                    <span>KvK: 53331540</span>
                    <span>Sneek</span>
                </div>
            </div>
        </div>
    </div>
</div>
