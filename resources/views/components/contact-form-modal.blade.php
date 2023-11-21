<x-filament::modal>
    <x-slot name="trigger">
        {{ $trigger ?? $slot }}
    </x-slot>

    @if ($title ?? null)
        <h2 class="text-2xl">{{ $title }}</h2>
    @endif

    @isset ($content)
        <div {{ $content->attributes }}>
            {!! $content !!}
        </div>
    @endif

    <livewire:contact-form />
</x-filament::modal>
