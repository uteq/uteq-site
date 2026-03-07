<x-layouts.app title="Werkwijze" metaDescription="Hoe UTEQ werkt: van kennismaking tot werkende software in drie stappen. Vaste prijs, geen verrassingen.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="font-sregs-bold text-4xl md:text-5xl text-white tracking-wide leading-tight mb-4">Onze werkwijze</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Van probleem naar werkende software. Vaste prijs, wekelijkse updates, duidelijke afspraken.</p>
        </div>
    </div>

    @include('pages.home.how')

    <div class="bg-white py-24 px-8">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-sregs-bold text-secondary mb-8">Wat maakt ons anders?</h2>

            <div class="space-y-8">
                <div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">Vaste prijs</h3>
                    <p class="text-gray-600 leading-relaxed">Geen uurtje-factuurtje. Wij noemen vooraf een prijs en daar houden we ons aan. Zo weet je precies waar je aan toe bent.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">Wekelijkse voortgang</h3>
                    <p class="text-gray-600 leading-relaxed">Je krijgt elke week een update over wat er gebouwd is. Je test, geeft feedback en stuurt bij. Geen black box waar na drie maanden iets uitkomt.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-secondary mb-2">Bouwplan zonder verplichting</h3>
                    <p class="text-gray-600 leading-relaxed">Het bouwplan is een betaald, concreet plan met vaste prijs. Past het niet? Dan stop je daar, zonder verdere verplichting.</p>
                </div>
            </div>
        </div>
    </div>

    @include('pages.home.comments')
    @include('pages.home.footer')

</x-layouts.app>
