<x-layouts.app title="Werkwijze" metaDescription="Hoe UTEQ werkt: van kennismaking tot werkende software in drie stappen. Vaste prijs, geen verrassingen.">

    <div class="bg-secondary pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Werkwijze</span>
            <h1 class="font-sregs-bold text-4xl md:text-5xl lg:text-6xl text-white tracking-wide leading-tight mb-4">Zo werken wij</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Van probleem naar werkende software. Vaste prijs, wekelijkse updates, duidelijke afspraken.</p>
        </div>
    </div>

    @include('pages.home.how')

    <div class="bg-white py-24 px-8">
        <div class="max-w-4xl mx-auto">
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Wat maakt ons anders</span>
            <h2 class="text-3xl md:text-4xl font-sregs-bold text-secondary mb-12">Geen verrassingen, alleen werkende software</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="card-tilt rounded-2xl border border-gray-200 p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-500">
                    <span class="font-mono text-xs text-primary tracking-widest mb-4 block">01</span>
                    <h3 class="text-xl font-semibold text-secondary mb-3">Vaste prijs</h3>
                    <p class="text-gray-600 leading-relaxed">Geen uurtje factuurtje. Wij noemen vooraf een prijs en daar houden we ons aan. Zo weet je precies waar je aan toe bent.</p>
                </div>
                <div class="card-tilt rounded-2xl border border-gray-200 p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-500">
                    <span class="font-mono text-xs text-primary tracking-widest mb-4 block">02</span>
                    <h3 class="text-xl font-semibold text-secondary mb-3">Wekelijkse voortgang</h3>
                    <p class="text-gray-600 leading-relaxed">Je krijgt elke week een update over wat er gebouwd is. Je test, geeft feedback en stuurt bij. Geen black box waar na drie maanden iets uitkomt.</p>
                </div>
                <div class="card-tilt rounded-2xl border border-gray-200 p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-500">
                    <span class="font-mono text-xs text-primary tracking-widest mb-4 block">03</span>
                    <h3 class="text-xl font-semibold text-secondary mb-3">Zonder verplichting</h3>
                    <p class="text-gray-600 leading-relaxed">Het bouwplan is een betaald, concreet plan met vaste prijs. Past het niet? Dan stop je daar, zonder verdere verplichting.</p>
                </div>
            </div>
        </div>
    </div>

    @include('pages.home.comments')
    @include('pages.home.footer')

</x-layouts.app>
