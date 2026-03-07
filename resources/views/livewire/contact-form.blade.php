<div>
    @if ($done)
        <p class="text-green-700 font-medium py-4">Bedankt voor je bericht, we nemen zo snel mogelijk contact met je op.</p>
    @else
        <form wire:submit="create" class="space-y-5">
            {{-- Naam --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-name" class="text-sm font-medium text-gray-700 sm:pt-2">Naam <span class="text-red-500">*</span></label>
                <div class="sm:col-span-2">
                    <input id="cf-name" type="text" wire:model="name" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm" />
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Bedrijfsnaam --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-company" class="text-sm font-medium text-gray-700 sm:pt-2">Bedrijfsnaam <span class="text-red-500">*</span></label>
                <div class="sm:col-span-2">
                    <input id="cf-company" type="text" wire:model="company" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm" />
                    @error('company') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- E-mailadres --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-email" class="text-sm font-medium text-gray-700 sm:pt-2">E-mailadres <span class="text-red-500">*</span></label>
                <div class="sm:col-span-2">
                    <input id="cf-email" type="email" wire:model="email" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm" />
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Telefoonnummer --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-phone" class="text-sm font-medium text-gray-700 sm:pt-2">Telefoonnummer</label>
                <div class="sm:col-span-2">
                    <input id="cf-phone" type="text" wire:model="phone" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm" />
                </div>
            </div>

            {{-- Aantal medewerkers --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-employees" class="text-sm font-medium text-gray-700 sm:pt-2">Aantal medewerkers</label>
                <div class="sm:col-span-2">
                    <select id="cf-employees" wire:model="employees" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm">
                        <option value="">Maak een keuze</option>
                        <option value="1-10">1 - 10</option>
                        <option value="10-25">10 - 25</option>
                        <option value="25-50">25 - 50</option>
                        <option value="50-100">50 - 100</option>
                        <option value="100+">100+</option>
                    </select>
                </div>
            </div>

            {{-- Budget-indicatie --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-budget" class="text-sm font-medium text-gray-700 sm:pt-2">Budget-indicatie</label>
                <div class="sm:col-span-2">
                    <select id="cf-budget" wire:model="budget" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm">
                        <option value="">Maak een keuze</option>
                        <option value="<10k">Tot €10.000</option>
                        <option value="10-25k">€10.000 - €25.000</option>
                        <option value="25-50k">€25.000 - €50.000</option>
                        <option value="50k+">€50.000+</option>
                        <option value="unknown">Weet ik nog niet</option>
                    </select>
                </div>
            </div>

            {{-- Bericht --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 items-start gap-1 sm:gap-4">
                <label for="cf-content" class="text-sm font-medium text-gray-700 sm:pt-2">Bericht</label>
                <div class="sm:col-span-2">
                    <textarea id="cf-content" wire:model="content" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring-primary text-sm"></textarea>
                </div>
            </div>

            <button type="submit" class="bg-primary rounded-lg px-4 py-3 text-secondary w-full mt-4 font-medium hover:bg-primary/90 transition-colors">
                Verstuur aanvraag
            </button>
        </form>
    @endif
</div>
