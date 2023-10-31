<div>

    @if ($done)
        Bedankt voor je bericht, we nemen zo snel mogelijk contact met je op.
    @else
        <form wire:submit="create">
            {{ $this->form }}

            <button type="submit" class="bg-primary rounded-lg px-4 py-3 text-white w-full mt-10 font-medium">
                Verstuur bericht
            </button>
        </form>
    @endunless

    <x-filament-actions::modals />
</div>
