@props(['title' => null])

{{-- Trigger button that dispatches event to global modal --}}
<div x-data @click="$dispatch('open-contact-modal', { title: '{{ $title }}' })">
    {{ $slot }}
</div>
