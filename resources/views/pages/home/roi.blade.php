<div class="relative bg-secondary py-20 lg:py-28 overflow-hidden" id="investering">
    <div class="absolute top-0 left-0 w-1/2 h-full bg-gradient-to-r from-primary/[0.08] to-transparent pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-8 relative">
        <div class="text-center mb-16">
            <p data-aos="fade-up" class="text-primary font-semibold uppercase tracking-widest text-sm mb-4">Investering</p>
            <h2 data-aos="fade-up" class="font-sregs-bold text-3xl md:text-4xl lg:text-5xl text-white leading-tight mb-4">
                Wat kost niets doen?
            </h2>
            <p data-aos="fade-up" class="text-gray-400 text-lg max-w-2xl mx-auto">
                Vergelijk de opties. Reken het zelf uit.
            </p>
        </div>

        {{-- Vergelijkingstabel --}}
        <div data-aos="fade-up" class="grid md:grid-cols-3 gap-6 mb-16">
            {{-- Optie 1: Niets doen --}}
            <div class="glass-card rounded-2xl p-6 card-hover">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-red-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <h3 class="font-sregs-bold text-lg text-white">Niets doen</h3>
                </div>
                <div class="space-y-3 text-gray-400 text-sm">
                    <div class="flex justify-between">
                        <span>Overhead per extra klant</span>
                        <span class="text-white">&euro;50.000/jaar</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Fouten &amp; vertraging</span>
                        <span class="text-white">&euro;10.000/jaar</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Gemiste kansen (groei)</span>
                        <span class="text-white">?</span>
                    </div>
                    <div class="border-t border-white/10 pt-3 mt-3">
                        <div class="flex justify-between font-semibold">
                            <span>Totaal over 5 jaar</span>
                            <span class="text-red-400">&euro;300.000+</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Optie 2: SaaS --}}
            <div class="glass-card rounded-2xl p-6 card-hover">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-yellow-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-sregs-bold text-lg text-white">SaaS-pakket</h3>
                </div>
                <div class="space-y-3 text-gray-400 text-sm">
                    <div class="flex justify-between">
                        <span>Licentiekosten</span>
                        <span class="text-white">&euro;1.000/maand</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Implementatie &amp; aanpassing</span>
                        <span class="text-white">&euro;15.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jij past je aan de software aan</span>
                        <span class="text-white">Ja</span>
                    </div>
                    <div class="border-t border-white/10 pt-3 mt-3">
                        <div class="flex justify-between font-semibold">
                            <span>Totaal over 5 jaar</span>
                            <span class="text-yellow-400">&euro;75.000+</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Optie 3: Maatwerk --}}
            <div class="glass-card-strong rounded-2xl p-6 border-2 border-primary relative card-hover">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-secondary text-xs font-bold px-3 py-1 rounded-full">
                    Aanbevolen
                </div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-primary/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="font-sregs-bold text-lg text-white">Maatwerk</h3>
                </div>
                <div class="space-y-3 text-gray-400 text-sm">
                    <div class="flex justify-between">
                        <span>Eenmalige investering</span>
                        <span class="text-white">&euro;35.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Maandelijkse kosten</span>
                        <span class="text-primary">&euro;0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>100% eigendom</span>
                        <span class="text-primary">Ja</span>
                    </div>
                    <div class="border-t border-white/10 pt-3 mt-3">
                        <div class="flex justify-between font-semibold">
                            <span>Totaal over 5 jaar</span>
                            <span class="text-primary">&euro;35.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ROI Rekenvoorbeeld --}}
        <div data-aos="fade-up" class="glass-card-strong rounded-3xl p-8 md:p-12">
            <h3 class="font-sregs-bold text-2xl text-white mb-6">Rekenvoorbeeld: Administratie automatiseren</h3>

            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-primary font-semibold mb-4">Voor automatisering</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex justify-between">
                            <span>Administratieve overhead</span>
                            <span>&euro;25.000/jaar</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Fouten corrigeren</span>
                            <span>&euro;5.000/jaar</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Overwerk bij piekdrukte</span>
                            <span>&euro;3.000/jaar</span>
                        </li>
                        <li class="flex justify-between border-t border-white/10 pt-3 font-semibold text-white">
                            <span>Jaarlijkse kosten</span>
                            <span>&euro;33.000</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-primary font-semibold mb-4">Na automatisering</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex justify-between">
                            <span>Eenmalige investering</span>
                            <span>&euro;35.000</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Jaarlijkse besparing</span>
                            <span class="text-primary">&euro;33.000</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Terugverdiend in</span>
                            <span class="text-primary">13 maanden</span>
                        </li>
                        <li class="flex justify-between border-t border-white/10 pt-3 font-semibold text-white">
                            <span>Winst na 5 jaar</span>
                            <span class="text-primary">&euro;130.000</span>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="text-gray-500 text-sm mt-6">
                * Dit is een voorbeeldberekening. Je werkelijke ROI hangt af van je specifieke situatie. We rekenen dit samen uit in het eerste gesprek.
            </p>
        </div>
    </div>
</div>
