<x-layouts.app title="Projecten" metaDescription="Bekijk de projecten die UTEQ heeft gebouwd: dashboards, portalen en automatiseringen voor zakelijke dienstverleners.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="font-sregs-bold text-4xl md:text-5xl text-white tracking-wide leading-tight mb-4">Onze projecten</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Wat wij gebouwd hebben voor onze klanten.</p>
        </div>
    </div>

    @include('pages.home.projects')
    @include('pages.home.comments')
    @include('pages.home.footer')

</x-layouts.app>
