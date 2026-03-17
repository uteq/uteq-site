<x-layouts.app title="Projecten" metaDescription="Bekijk de projecten die UTEQ heeft gebouwd: dashboards, portalen en automatiseringen voor zakelijk, finance en bouw.">

    <div class="bg-secondary pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Projecten</span>
            <h1 class="font-sregs-bold text-4xl md:text-5xl lg:text-6xl text-white tracking-wide leading-tight mb-4">Wat wij gebouwd hebben</h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto">Dashboards, portalen en automatiseringen voor onze klanten.</p>
        </div>
    </div>

    @include('pages.home.projects')
    @include('pages.home.comments')
    @include('pages.home.footer')

</x-layouts.app>
