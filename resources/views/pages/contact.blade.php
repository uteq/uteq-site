<x-layouts.app title="Contact" metaDescription="Neem contact op met UTEQ. Vraag een gratis kennismakingsgesprek aan of stel een vraag.">

    <div class="bg-secondary pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Contact</span>
            <h1 class="font-sregs-bold text-4xl md:text-5xl lg:text-6xl text-white tracking-wide leading-tight mb-4">Laten we praten</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Vertel ons waar je tegenaan loopt. Wij denken graag mee.</p>
        </div>
    </div>

    <div class="bg-white py-24 px-8">
        <div class="max-w-4xl mx-auto">

            {{-- Contact details --}}
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="rounded-2xl border border-gray-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-sm font-semibold text-secondary mb-1">E-mail</h3>
                    <a href="mailto:info@uteq.nl" class="text-gray-600 hover:text-primary transition-colors">info@uteq.nl</a>
                </div>
                <div class="rounded-2xl border border-gray-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <h3 class="text-sm font-semibold text-secondary mb-1">Telefoon</h3>
                    <a href="tel:+31614032722" class="text-gray-600 hover:text-primary transition-colors">+31 6 14032722</a>
                </div>
                <div class="rounded-2xl border border-gray-200 p-6">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-sm font-semibold text-secondary mb-1">Bezoekadres</h3>
                    <p class="text-gray-600">Wolkammersstraat 6c</p>
                    <p class="text-gray-600">8601VB Sneek</p>
                </div>
            </div>

            {{-- Contact form --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-8 md:p-10 mb-16">
                <span class="font-mono text-xs tracking-widest text-primary uppercase mb-2 block">Bericht sturen</span>
                <h2 class="text-2xl font-sregs-bold text-secondary mb-8">Vertel ons over je situatie</h2>
                <livewire:contact-form />
            </div>

            {{-- Foto --}}
            <div class="mb-6">
                <img
                    src="{{ Vite::asset('resources/images/kantoor-steenklip.webp') }}"
                    alt="UTEQ kantoor bij winkelcentrum De Steenklip, Sneek"
                    class="w-full h-[400px] rounded-2xl border border-gray-200 object-cover object-left"
                />
            </div>

            {{-- Bereikbaarheid --}}
            <div class="flex flex-col gap-2 text-sm text-gray-500 mb-8 px-1">
                <div class="flex items-start gap-2">
                    <svg class="w-4 h-4 mt-0.5 shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10m10 0h4l3-3V8a1 1 0 00-1-1h-3"></path></svg>
                    <span>Parkeer voor De Steenklip of bij de McDonald's, beide op loopafstand.</span>
                </div>
                <div class="flex items-start gap-2">
                    <svg class="w-4 h-4 mt-0.5 shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1"></path></svg>
                    <span>De ingang is aan de zijde van De Steenklip.</span>
                </div>
            </div>

            {{-- Google Maps --}}
            <div class="mb-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d600!2d5.6555!3d53.0325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c8fdee370543b1%3A0x5b3b0f4e8e0f1a0!2sWolkammersstraat%206a%2C%208601%20VB%20Sneek!5e0!3m2!1snl!2snl!4v1"
                    class="w-full h-[250px] rounded-2xl border border-gray-200"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>

            <div class="px-1">
                <a href="https://www.google.com/maps/dir//Wolkammersstraat+6a,+8601+VB+Sneek" target="_blank" rel="noopener noreferrer" class="btn-text text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Bekijk route in Google Maps
                </a>
            </div>
        </div>
    </div>

    @include('pages.home.footer')

</x-layouts.app>
