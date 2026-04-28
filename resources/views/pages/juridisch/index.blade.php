<x-layouts.app title="Juridisch" metaDescription="Algemene voorwaarden, SaaS-voorwaarden, verwerkersovereenkomst, privacy statement en subverwerkerlijst van UTEQ.">

    <div class="bg-secondary pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Juridisch</span>
            <h1 class="font-sregs-bold text-4xl md:text-5xl lg:text-6xl text-white tracking-wide leading-tight mb-4">Voorwaarden en privacy</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">De juridische basis onder elke samenwerking met UTEQ. Open, leesbaar en altijd actueel.</p>
        </div>
    </div>

    <div class="bg-white py-20 px-6">
        <div class="max-w-4xl mx-auto">

            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($documents as $doc)
                    <a href="{{ route('juridisch.show', $doc->slug) }}"
                       class="group rounded-2xl border border-gray-200 p-8 hover:shadow-xl hover:border-primary/40 transition-all duration-500 block">
                        <span class="font-mono text-xs tracking-widest text-primary uppercase mb-3 block">
                            Versie {{ $doc->versie }} &middot; {{ $doc->ingangsdatumFormatted() }}
                        </span>
                        <h2 class="text-xl font-sregs-bold text-secondary mb-3 group-hover:text-primary transition-colors">
                            {{ $doc->titel }}
                        </h2>
                        <p class="text-gray-600 leading-relaxed text-sm">
                            @switch($doc->slug)
                                @case('algemene-voorwaarden')
                                    De algemene voorwaarden voor alle diensten van UTEQ. Geldt voor offertes, projecten en samenwerking.
                                    @break
                                @case('saas-voorwaarden')
                                    Aanvullende voorwaarden voor UTEQ SaaS-diensten zoals UteqOS en aiteam.
                                    @break
                                @case('verwerkersovereenkomst')
                                    Verwerkersovereenkomst (DPA) voor klanten waarvoor UTEQ persoonsgegevens verwerkt.
                                    @break
                                @case('privacy')
                                    Hoe UTEQ omgaat met persoonsgegevens van bezoekers, klanten en relaties.
                                    @break
                            @endswitch
                        </p>
                        <span class="mt-4 inline-flex items-center gap-1 text-sm text-primary font-medium">
                            Lees document
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </a>
                @endforeach
            </div>

            <div class="mt-12 rounded-2xl border border-gray-200 bg-gray-50 p-8">
                <h2 class="text-xl font-sregs-bold text-secondary mb-3">Subverwerkerlijst</h2>
                <p class="text-gray-600 leading-relaxed text-sm mb-4">
                    De actuele lijst van subverwerkers die UTEQ inzet voor hosting, AI-diensten, e-mail en betalingen, met datalocatie en doorgiftegrondslag per partij.
                </p>
                <a href="/juridisch/subverwerkers" class="inline-flex items-center gap-1 text-sm text-primary font-medium">
                    Bekijk subverwerkerlijst
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            <div class="mt-12 text-sm text-gray-500">
                Vragen over een document? Mail naar <a href="mailto:info@uteq.nl" class="text-primary hover:underline">info@uteq.nl</a>.
            </div>

        </div>
    </div>

    @include('pages.home.footer')

</x-layouts.app>
