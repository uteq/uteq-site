<div>
    @if ($done)
        <div class="rounded-xl border border-primary/30 bg-primary/5 p-5 text-sm text-secondary">
            <p class="font-semibold mb-1">Check je inbox</p>
            <p class="text-gray-600">Je krijgt een e-mail met een bevestigingslink. Pas na bevestiging staat de aanmelding actief.</p>
        </div>
    @else
        <form wire:submit.prevent="subscribe" class="space-y-3">
            <div class="hidden">
                <label>Laat dit veld leeg
                    <input type="text" wire:model="hp" autocomplete="off" tabindex="-1">
                </label>
            </div>

            <div>
                <label for="sub-email" class="block text-xs font-mono uppercase tracking-wider text-gray-500 mb-1">E-mail</label>
                <input
                    id="sub-email"
                    type="email"
                    wire:model="email"
                    required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30"
                    placeholder="naam@bedrijf.nl">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="sub-name" class="block text-xs font-mono uppercase tracking-wider text-gray-500 mb-1">Naam (optioneel)</label>
                <input
                    id="sub-name"
                    type="text"
                    wire:model="name"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            </div>

            <button
                type="submit"
                class="btn-primary w-full justify-center px-5 py-2.5 text-sm"
                wire:loading.attr="disabled">
                <span wire:loading.remove>Aanmelden</span>
                <span wire:loading>Verzenden...</span>
            </button>

            <p class="text-xs text-gray-500">
                Door aan te melden ga je akkoord met het ontvangen van een bevestigingsmail. Zie het
                <a href="{{ route('privacy') }}" class="hover:text-primary">privacy statement</a>.
            </p>
        </form>
    @endif
</div>
