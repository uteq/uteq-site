<x-layouts.app title="Vacatures" metaDescription="Bekijk de openstaande vacatures bij UTEQ in Sneek en werk mee aan maatwerksoftware en eigen producten.">

    <div class="bg-secondary pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Werken bij UTEQ</span>
            <h1 class="font-sregs-bold text-4xl md:text-5xl lg:text-6xl text-white tracking-wide leading-tight mb-4">Vacatures</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Werk in een klein team aan maatwerksoftware en eigen producten, met veel ruimte voor technische verantwoordelijkheid.</p>
        </div>
    </div>

    <div class="bg-white py-20 px-6">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('vacature.developer') }}" class="group block rounded-2xl border border-gray-200 p-8 md:p-10 hover:shadow-lg hover:border-primary/30 transition-all duration-300">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8">
                    <div>
                        <span class="font-mono text-xs tracking-widest text-primary uppercase mb-3 block">Development</span>
                        <h2 class="font-sregs-bold text-2xl md:text-3xl text-secondary mb-3 group-hover:text-primary transition-colors">Full Stack Medior Developer - AI Enabled</h2>
                        <p class="text-gray-600 mb-5">Sneek / hybride · fulltime · €4.000 tot €5.000 bruto per maand</p>
                        <p class="text-gray-500 leading-relaxed max-w-2xl">Bouw met Laravel, Livewire en AI-agents aan webapplicaties voor Nederlandse mkb-bedrijven en onze eigen producten.</p>
                    </div>
                    <span class="inline-flex shrink-0 items-center gap-2 font-semibold text-secondary group-hover:text-primary transition-colors">
                        Bekijk vacature
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </span>
                </div>
            </a>
        </div>
    </div>

    @include('pages.home.footer')

</x-layouts.app>
