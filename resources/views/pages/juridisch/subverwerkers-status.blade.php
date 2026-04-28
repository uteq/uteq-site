<x-layouts.app
    title="Aanmelding subverwerkers"
    metaDescription="Bevestiging of afmelding van de UTEQ subverwerkerlijst-mailings.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-3xl mx-auto">
            <a href="{{ route('juridisch.subverwerkers') }}" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-primary transition-colors mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Subverwerkerlijst
            </a>
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Subverwerkers</span>
            <h1 class="font-sregs-bold text-3xl md:text-4xl text-white tracking-wide leading-tight mb-4">
                @if ($kind === 'confirmed')
                    Aanmelding bevestigd
                @else
                    Afgemeld
                @endif
            </h1>
            <p class="text-base text-gray-400">{{ $message }}</p>
        </div>
    </div>

    <div class="bg-white py-16 px-6">
        <div class="max-w-3xl mx-auto text-sm text-gray-600">
            Je kunt op elk moment terug naar de
            <a href="{{ route('juridisch.subverwerkers') }}" class="text-primary hover:underline">subverwerkerlijst</a>
            of het
            <a href="{{ route('privacy') }}" class="text-primary hover:underline">privacy statement</a>.
        </div>
    </div>

    @include('pages.home.footer')

</x-layouts.app>
