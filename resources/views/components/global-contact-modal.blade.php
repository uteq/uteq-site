{{-- Global Contact Modal - renders at body level to avoid stacking context issues --}}
<div
    x-data="{
        open: false,
        title: 'Plan een gesprek'
    }"
    x-on:open-contact-modal.window="open = true; title = $event.detail.title || 'Plan een gesprek'"
    x-on:keydown.escape.window="open = false"
    x-cloak
>
    {{-- Backdrop --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm"
        @click="open = false"
    ></div>

    {{-- Modal Panel --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-50 overflow-y-auto"
    >
        <div class="flex min-h-full items-center justify-center p-4">
            <div
                class="relative w-full max-w-md transform rounded-2xl bg-white p-6 shadow-xl transition-all"
                @click.stop
            >
                {{-- Close button --}}
                <button
                    @click="open = false"
                    class="absolute right-4 top-4 text-gray-400 hover:text-gray-600 transition-colors"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Title --}}
                <h2 class="text-2xl font-sregs-bold text-secondary mb-6" x-text="title"></h2>

                {{-- Contact info --}}
                <div class="text-gray-600 mb-6">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10.5 18.75a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" />
                            <path fill-rule="evenodd" d="M8.625.75A3.375 3.375 0 0 0 5.25 4.125v15.75a3.375 3.375 0 0 0 3.375 3.375h6.75a3.375 3.375 0 0 0 3.375-3.375V4.125A3.375 3.375 0 0 0 15.375.75h-6.75ZM7.5 4.125C7.5 3.504 8.004 3 8.625 3H9.75v.375c0 .621.504 1.125 1.125 1.125h2.25c.621 0 1.125-.504 1.125-1.125V3h1.125c.621 0 1.125.504 1.125 1.125v15.75c0 .621-.504 1.125-1.125 1.125h-6.75A1.125 1.125 0 0 1 7.5 19.875V4.125Z" clip-rule="evenodd" />
                        </svg>
                        <a href="tel:+31614032722" class="hover:text-primary transition-colors">06 140 32 722</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                        <a href="mailto:info@uteq.nl" class="hover:text-primary transition-colors">info@uteq.nl</a>
                    </div>
                </div>

                {{-- Form section --}}
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-gray-600 mb-4">Laat een bericht achter</p>
                    <livewire:contact-form />
                </div>
            </div>
        </div>
    </div>
</div>
