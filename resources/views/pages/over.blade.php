<x-layouts.app title="Over ons" metaDescription="UTEQ is een softwarebedrijf uit Sneek dat maatwerk software bouwt voor zakelijke dienstverleners.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="font-sregs-bold text-4xl md:text-5xl text-white tracking-wide leading-tight mb-4">Over UTEQ</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Wij bouwen software die past bij hoe jij werkt.</p>
        </div>
    </div>

    <div class="bg-white py-24 px-8">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-sregs-bold text-secondary mb-6">Wij vullen het gat</h2>
            <p class="text-lg text-gray-600 leading-relaxed mb-6">
                Tussen de websitebouwer en de grote softwarepartijen zit een gat. Bedrijven die groeien en tegen de grenzen van hun tools aanlopen, maar voor wie een groot IT-traject niet past. Daar zitten wij.
            </p>
            <p class="text-lg text-gray-600 leading-relaxed mb-12">
                Wij bouwen maatwerk software voor zakelijke dienstverleners. Planningsdashboards, klantportalen, automatiseringen. Software die doet wat jij nodig hebt, zonder de overhead van een groot project.
            </p>
        </div>
    </div>

    @include('pages.home.team')
    @include('pages.home.comments')
    @include('pages.home.footer')

</x-layouts.app>
