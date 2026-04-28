<x-layouts.app
    :title="$document->titel"
    metaDescription="{{ $document->titel }}, versie {{ $document->versie }}, ingangsdatum {{ $document->ingangsdatumFormatted() }}.">

    <div class="bg-secondary pt-32 pb-16 px-6">
        <div class="max-w-3xl mx-auto">
            <a href="{{ route('juridisch.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-primary transition-colors mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Alle juridische documenten
            </a>
            <span class="font-mono text-xs tracking-widest text-primary uppercase mb-4 block">
                Juridisch &middot; versie {{ $document->versie }}
            </span>
            <h1 class="font-sregs-bold text-3xl md:text-4xl lg:text-5xl text-white tracking-wide leading-tight mb-4">
                {{ $document->titel }}
            </h1>
            <p class="text-base text-gray-400">
                Ingangsdatum {{ $document->ingangsdatumFormatted() }}.
                @if ($document->pdfExists())
                    <a href="{{ $document->pdfUrl() }}" class="text-primary hover:underline ml-1" download>Download PDF</a>.
                @endif
            </p>
        </div>
    </div>

    <div class="bg-white py-16 px-6">
        <div class="max-w-3xl mx-auto">
            <article class="juridisch-prose">
                {!! $document->html !!}
            </article>

            <div class="mt-16 pt-8 border-t border-gray-200 text-sm text-gray-500 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <span>
                    Versie {{ $document->versie }} &middot; ingangsdatum {{ $document->ingangsdatumFormatted() }}.
                </span>
                @if ($document->pdfExists())
                    <a href="{{ $document->pdfUrl() }}" class="inline-flex items-center gap-1 text-primary hover:underline" download>
                        Download als PDF
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"></path>
                        </svg>
                    </a>
                @endif
            </div>

            <div class="mt-4 text-xs text-gray-400">
                Eerdere versies blijven beschikbaar via <a href="mailto:info@uteq.nl?subject=Verzoek%20historische%20versie" class="hover:text-primary">info@uteq.nl</a>.
            </div>
        </div>
    </div>

    @push('head')
    <style>
        .juridisch-prose { color: #1f2937; line-height: 1.7; font-size: 16px; }
        .juridisch-prose h2 {
            font-weight: 700;
            font-size: 1.4rem;
            color: #0f172a;
            margin: 2.5rem 0 0.75rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
            letter-spacing: -0.005em;
        }
        .juridisch-prose h3 {
            font-weight: 700;
            font-size: 1.05rem;
            color: #0f172a;
            margin: 1.5rem 0 0.5rem;
        }
        .juridisch-prose p { margin: 0 0 0.85rem; }
        .juridisch-prose strong { color: #0f172a; font-weight: 600; }
        .juridisch-prose ul { margin: 0.5rem 0 1rem 0; padding-left: 1.4rem; list-style: disc; }
        .juridisch-prose ol { margin: 0.5rem 0 1rem 0; padding-left: 1.4rem; list-style: decimal; }
        .juridisch-prose li { margin-bottom: 0.35rem; }
        .juridisch-prose hr { border: 0; border-top: 1px solid #e5e7eb; margin: 2rem 0; }
        .juridisch-prose a { color: #0f766e; text-decoration: underline; }
        .juridisch-prose a:hover { color: #0d9488; }
        .juridisch-prose blockquote {
            margin: 1rem 0; padding: 0.6rem 1rem;
            border-left: 3px solid #d1d5db; color: #4b5563; font-style: italic;
        }
        .juridisch-prose table {
            width: 100%; border-collapse: collapse;
            margin: 1rem 0 1.5rem; font-size: 0.95rem;
        }
        .juridisch-prose th, .juridisch-prose td {
            border: 1px solid #e5e7eb; padding: 0.55rem 0.75rem;
            text-align: left; vertical-align: top;
        }
        .juridisch-prose th { background: #f9fafb; font-weight: 600; color: #0f172a; }
        .juridisch-prose em { color: #6b7280; }
    </style>
    @endpush

    @include('pages.home.footer')

</x-layouts.app>
