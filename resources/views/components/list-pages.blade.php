@props(['paginator', 'reactive' => false])
@if ($paginator->hasPages())
    <nav data-page-weight-next class="mt-4 flex items-center justify-between gap-4" aria-label="Paginering">
        @if ($paginator->onFirstPage())
            <span></span>
        @elseif ($reactive)
            <button type="button" wire:click="previousPage" wire:loading.attr="disabled" class="rounded-lg border border-gray-300 px-3 py-1.5 hover:border-primary" aria-label="Vorige pagina">←</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="rounded-lg border border-gray-300 px-3 py-1.5 hover:border-primary" aria-label="Vorige pagina">←</a>
        @endif
        <span class="text-sm text-gray-600">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
        @if (! $paginator->hasMorePages())
            <span></span>
        @elseif ($reactive)
            <button type="button" wire:click="nextPage" wire:loading.attr="disabled" class="rounded-lg border border-gray-300 px-3 py-1.5 hover:border-primary" aria-label="Volgende pagina">→</button>
        @else
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="rounded-lg border border-gray-300 px-3 py-1.5 hover:border-primary" aria-label="Volgende pagina">→</a>
        @endif
    </nav>
@endif
