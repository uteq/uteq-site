<x-layouts.app
    title="Subverwerkers"
    metaDescription="Actuele lijst van subverwerkers die UTEQ inzet voor hosting, AI-diensten, e-mail en betalingen.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-5xl mx-auto">
            <a href="{{ route('juridisch.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-primary transition-colors mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Alle juridische documenten
            </a>
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">Juridisch</span>
            <h1 class="font-sregs-bold text-3xl md:text-4xl lg:text-5xl text-white tracking-wide leading-tight mb-4">
                Subverwerkerlijst
            </h1>
            <p class="text-base text-gray-400 max-w-3xl">
                Deze lijst is de actuele Bijlage A bij de
                <a href="{{ route('juridisch.show', 'verwerkersovereenkomst') }}" class="text-primary hover:underline">verwerkersovereenkomst</a>.
                Wijzigingen worden minimaal veertien dagen vooraf aangekondigd via deze pagina, de
                <a href="{{ route('juridisch.subverwerkers.rss') }}" class="text-primary hover:underline">RSS-feed</a>
                en, voor wie zich heeft aangemeld, per e-mail.
            </p>
        </div>
    </div>

    <div class="bg-white py-16 px-6">
        <div class="max-w-5xl mx-auto">

            <div class="overflow-x-auto rounded-2xl border border-gray-200">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-left text-xs uppercase tracking-wider text-gray-500">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Subverwerker</th>
                            <th class="px-4 py-3 font-semibold">Dienst</th>
                            <th class="px-4 py-3 font-semibold">Datalocatie</th>
                            <th class="px-4 py-3 font-semibold">Doorgiftegrondslag</th>
                            <th class="px-4 py-3 font-semibold">Modeltraining op klantdata</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700">
                        @forelse ($subprocessors as $sub)
                            <tr class="align-top">
                                <td class="px-4 py-3 font-semibold text-secondary">{{ $sub->name }}</td>
                                <td class="px-4 py-3">{{ $sub->service }}</td>
                                <td class="px-4 py-3">{{ $sub->data_location }}</td>
                                <td class="px-4 py-3">{{ $sub->transfer_basis }}</td>
                                <td class="px-4 py-3">{{ $sub->model_training }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-4 py-6 text-center text-gray-500">Nog geen subverwerkers gepubliceerd.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <p class="text-xs text-gray-500 mt-3">
                Niet alle subverwerkers zijn voor iedere dienst van toepassing. De daadwerkelijk ingeschakelde subverwerkers per dienst zijn op aanvraag specifiek opvraagbaar via info@uteq.nl.
            </p>

            <div class="mt-16 grid md:grid-cols-2 gap-10">
                <div>
                    <h2 class="text-xl font-sregs-bold text-secondary mb-3">Recente wijzigingen</h2>
                    <p class="text-xs text-gray-500 mb-4">Wijzigingen uit de afgelopen twaalf maanden.</p>
                    @forelse ($changes as $change)
                        <div id="change-{{ $change->id }}" class="border-l-2 border-primary/40 pl-4 mb-5">
                            <div class="text-xs uppercase tracking-wider text-gray-500">
                                {{ $change->effective_from->translatedFormat('j F Y') }} &middot; {{ ucfirst($change->change_type) }}
                            </div>
                            <p class="text-gray-700 mt-1">{{ $change->summary }}</p>
                            @if ($change->details)
                                <p class="text-gray-500 text-sm mt-1">{{ $change->details }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Geen wijzigingen in de afgelopen twaalf maanden.</p>
                    @endforelse
                    <div class="mt-4 text-xs text-gray-400">
                        Volg ook via <a href="{{ route('juridisch.subverwerkers.rss') }}" class="hover:text-primary">RSS</a>.
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-sregs-bold text-secondary mb-3">Blijf op de hoogte</h2>
                    <p class="text-gray-600 text-sm mb-4">
                        Meld je aan voor een mail bij iedere wijziging. UTEQ stuurt nooit ander materiaal naar dit adres en je kunt je per mail in één klik afmelden.
                    </p>
                    @livewire('subprocessor-subscribe')
                </div>
            </div>

        </div>
    </div>

    @include('pages.home.footer')

</x-layouts.app>
