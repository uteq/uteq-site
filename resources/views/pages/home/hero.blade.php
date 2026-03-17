<div class="relative isolate px-6 pt-14 lg:px-8 bg-secondary overflow-hidden" style="background-image: radial-gradient(ellipse 60% 80% at 50% 40%, rgba(1,220,130,0.05) 0%, transparent 70%);">

    {{-- Grain texture overlay --}}
    <svg class="absolute inset-0 w-full h-full pointer-events-none opacity-[0.04]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <filter id="hero-noise">
            <feTurbulence type="fractalNoise" baseFrequency="0.68" numOctaves="3" stitchTiles="stitch"/>
            <feColorMatrix type="saturate" values="0"/>
        </filter>
        <rect width="100%" height="100%" filter="url(#hero-noise)"/>
    </svg>

    {{-- UTEQ mark als massief watermark achter de content --}}
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none" aria-hidden="true">
        <svg class="hero-mark-watermark w-[55vw] max-w-[550px] h-auto" style="opacity: 0;" viewBox="0 0 65 66" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M36.6695 7.22359L18.3348 17.8092L12.2232 21.3377V49.5661L6.11158 46.0393V46.0375H6.10979L0 42.5108V14.2807L24.4463 0.166504L36.6695 7.22359ZM64.8547 54.8839C61.9949 58.4251 60.2746 60.1183 56.8953 62.3545C53.169 64.2742 50.8772 65.1083 45.9142 65.5612C42.3875 65.5612 39.7577 65.0382 32.9001 62.3545C28.7155 60.627 26.341 59.9494 22.0125 59.615C13.3089 59.2717 9.04519 60.3484 2.76644 64.9734C4.44173 61.6426 9.44244 55.5886 17.4091 54.1577C17.4091 54.1577 18.1551 53.9381 19.6274 53.8433L18.3342 53.097V53.0952H18.3324L12.2226 49.5684V49.5667L36.669 35.4525V7.22415L42.7805 10.7527H42.7823L48.8921 14.2812V42.5096L27.9447 54.6036C29.5509 54.9447 30.5993 55.265 30.5993 55.265C31.6221 55.5472 32.7438 55.8906 34.02 56.2878C35.8894 56.8765 37.387 57.4933 38.8102 58.0794C41.398 59.1451 43.7398 60.1096 47.6237 60.6198C55.6658 60.7223 59.5718 59.7049 64.8511 54.8839H64.8547Z" fill="#3EE88C"/>
        </svg>
    </div>

    <div class="relative mx-auto max-w-5xl text-center pb-24 pt-20 sm:pb-32 sm:pt-28 lg:pb-40 lg:pt-36">

        <h1 class="font-sregs-bold text-5xl sm:text-6xl md:text-7xl lg:text-8xl text-white tracking-wide leading-[1.08] mb-8">
            <span class="hero-line-mask">
                <span class="hero-reveal">Software die <span class="text-primary">werkt.</span></span>
            </span>
            <span class="hero-line-mask">
                <span class="hero-reveal">Zoals jij <span class="text-primary">werkt.</span></span>
            </span>
        </h1>

        <p class="hero-subtitle text-lg md:text-xl text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
            Maatwerksoftware voor zakelijk, finance en bouw. Vaste prijs. Geen verrassingen.
        </p>

        <div class="hero-cta">
            <x-contact-form-modal title="Vraag een kennismakingsgesprek aan">
                <button class="btn-primary px-8 py-4 md:px-10 md:py-5 md:text-lg shadow-sm">
                    Vraag een kennismakingsgesprek aan
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </x-contact-form-modal>
            <p class="text-gray-500 text-sm mt-3">Eerste gesprek altijd gratis</p>
        </div>

        {{-- Client logos marquee --}}
        <div class="hero-clients mt-20 pt-10 border-t border-white/10">
            <p class="text-gray-500 text-xs uppercase tracking-widest mb-5">Wij werken onder andere voor</p>
            <div class="overflow-hidden">
                <div class="marquee-track gap-x-16 items-center">
                    @for ($i = 0; $i < 2; $i++)
                    <span class="text-gray-400 text-sm font-semibold uppercase tracking-[0.15em] whitespace-nowrap hover:text-white transition-colors duration-300">CivilGrow</span>
                    <span class="text-gray-600 text-xs mx-1" aria-hidden="true">·</span>
                    <span class="text-gray-400 text-sm font-bold uppercase tracking-[0.2em] whitespace-nowrap hover:text-white transition-colors duration-300">Noorderinzicht</span>
                    <span class="text-gray-600 text-xs mx-1" aria-hidden="true">·</span>
                    <span class="text-gray-400 text-sm font-semibold uppercase tracking-[0.12em] whitespace-nowrap hover:text-white transition-colors duration-300">De Goede Advies</span>
                    <span class="text-gray-600 text-xs mx-1" aria-hidden="true">·</span>
                    <span class="text-gray-400 text-sm font-extrabold uppercase tracking-[0.18em] whitespace-nowrap hover:text-white transition-colors duration-300">Kubus</span>
                    <span class="text-gray-600 text-xs mx-1" aria-hidden="true">·</span>
                    <span class="text-gray-400 text-sm font-semibold uppercase tracking-[0.15em] whitespace-nowrap hover:text-white transition-colors duration-300">Biobase</span>
                    <span class="text-gray-600 text-xs mx-1" aria-hidden="true">·</span>
                    <span class="text-gray-400 text-sm font-bold uppercase tracking-[0.25em] whitespace-nowrap hover:text-white transition-colors duration-300">Easie</span>
                    <span class="text-gray-600 text-xs mx-8" aria-hidden="true">·</span>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
