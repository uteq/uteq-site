<x-filament::modal>
    <x-slot name="trigger">
        {{ $trigger ?? $slot }}
    </x-slot>

    @if ($title ?? null)
        <h2 class="text-2xl">{{ $title }}</h2>
    @endif

    <livewire:contact-form />
</x-filament::modal>
