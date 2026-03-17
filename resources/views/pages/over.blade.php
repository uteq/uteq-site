<x-layouts.app title="Over ons" metaDescription="UTEQ bouwt maatwerksoftware die past bij hoe jouw team werkt. Sneller, slimmer, voor een vaste prijs.">

    {{-- Hero + missie in één donker blok --}}
    <div class="bg-secondary pt-32 pb-24 lg:pb-32 px-6">
        <div class="max-w-5xl mx-auto">

            {{-- Header --}}
            <div class="text-center mb-20">
                <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Over ons</span>
                <h1 class="font-sregs-bold text-4xl md:text-5xl lg:text-6xl text-white tracking-wide leading-tight mb-4">Software die werkt.<br>Zoals jij werkt.</h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">Je zoekt software die past bij hoe jouw team werkt. Niet andersom.</p>
            </div>

            {{-- Missie + stats --}}
            <div class="grid md:grid-cols-2 gap-12 lg:gap-20 items-start">
                <div>
                    <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Ons verhaal</span>
                    <h2 class="text-2xl md:text-3xl font-sregs-bold text-white mb-6 leading-tight">Maatwerk dat binnen bereik is</h2>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Je weet precies wat je nodig hebt. Maar geen enkel bestaand systeem doet het zoals jij werkt. Te rigide, te breed, of te duur om aan te passen.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        Dat hoeft niet meer. Een goed plan maakt het verschil. Door jullie werkwijze eerst écht te begrijpen, bouwen we software die in één keer raak is. Vaste prijs, zonder verrassingen.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="border-t border-primary/20 pt-4">
                        <p class="text-4xl font-extrabold text-white">10+</p>
                        <p class="text-primary text-xs mt-2 uppercase tracking-widest">jaar ervaring</p>
                    </div>
                    <div class="border-t border-primary/20 pt-4">
                        <p class="text-4xl font-extrabold text-white">25+</p>
                        <p class="text-primary text-xs mt-2 uppercase tracking-widest">projecten</p>
                    </div>
                    <div class="border-t border-primary/20 pt-4">
                        <p class="text-4xl font-extrabold text-white">6</p>
                        <p class="text-primary text-xs mt-2 uppercase tracking-widest">sectoren</p>
                    </div>
                    <div class="border-t border-primary/20 pt-4">
                        <p class="text-4xl font-extrabold text-white tracking-tight">Vast</p>
                        <p class="text-primary text-xs mt-2 uppercase tracking-widest">vaste prijs</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('pages.home.team')
    @include('pages.home.comments')
    @include('pages.home.footer')

</x-layouts.app>
