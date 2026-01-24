<x-layouts.app :nav="false">
    {{-- Hero Section --}}
    <section class="bg-floral-white pt-28">
        <div class="max-w-6xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="max-w-3xl" data-aos="fade-up">
                    <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium">
                        Flexlokaal
                    </span>
                    <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-sregs-bold text-secondary leading-tight">
                        Bedankt voor je komst!
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                        Leuk dat je bij de presentatie in het Flexlokaal was. Hier kun je de slides en prompt
                        nog een keer terugkijken en downloaden.
                    </p>
                    <div class="mt-10">
                        <a href="#downloads" class="inline-flex items-center gap-3 rounded-xl bg-primary px-8 py-4 text-lg font-semibold text-white shadow-sm hover:bg-primary/90 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            Bekijk downloads
                        </a>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <p class="text-sm font-medium text-gray-500 mb-3">Bekijk de presentatie terug</p>
                    <div class="relative w-full overflow-hidden rounded-2xl shadow-lg" style="padding-bottom: 56.25%;">
                        <iframe
                            class="absolute inset-0 w-full h-full"
                            src="https://www.youtube.com/embed/JxacnXxg1Nw"
                            title="Flexlokaal presentatie"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Assets/Downloads Section --}}
    <section id="downloads" class="bg-white py-16 lg:py-24">
        <div class="max-w-6xl mx-auto px-6">
            <h2 data-aos="fade-up" class="text-3xl md:text-4xl font-sregs-bold text-secondary">Downloads</h2>
            <p class="mt-4 text-gray-600 max-w-2xl">
                De presentatie en prompt van de sessie, vrij te gebruiken en te delen.
            </p>

            <div class="mt-12 grid md:grid-cols-2 gap-8">
                {{-- Presentatie Card --}}
                <div data-aos="fade-up" class="rounded-2xl border border-gray-200 bg-white p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-secondary">AI inzetten voor je bedrijf</h3>
                            <p class="mt-2 text-gray-600">
                                De volledige presentatie met praktische voorbeelden om slimmer te werken, tijd te besparen en meer rust te creeren.
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                PDF
                            </div>
                            <a href="/downloads/flexlokaal-presentatie.pdf" download class="mt-4 inline-flex items-center gap-2 rounded-lg bg-secondary px-4 py-2 text-sm font-medium text-white hover:bg-secondary/90 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Prompts Card --}}
                <div data-aos="fade-up" data-aos-delay="100" class="rounded-2xl border border-gray-200 bg-white p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-secondary">AI Prompts</h3>
                            <p class="mt-2 text-gray-600">
                                De prompt uit de presentatie die je direct kunt gebruiken in je eigen werk.
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                Tekst / PDF
                            </div>
                            <a href="#prompt" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-secondary px-4 py-2 text-sm font-medium text-white hover:bg-secondary/90 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Bekijk prompt
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Prompts Detail Section --}}
    <section id="prompt" class="bg-gray-50 py-16 lg:py-24">
        <div class="max-w-6xl mx-auto px-6">
            <h2 data-aos="fade-up" class="text-3xl md:text-4xl font-sregs-bold text-secondary">
                Prompts
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl">
                Kopieer de prompt en probeer ze uit in ChatGPT, Claude of een andere AI-tool.
            </p>

            <div class="mt-12 space-y-6">
                {{-- Prompt 1 --}}
                <div x-data="{ copied: false }" data-aos="fade-up" class="rounded-2xl border border-gray-200 bg-white p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-secondary">Board of directors</h3>
                            <p class="mt-1 text-sm text-gray-500">Helpt jou om je doelen te behalen. Plan deze prompt maandelijks in je agenda voor maximaal effect.<br /> Pas de prompt aan en lever documenten aan met resultaat om een waardevol gesprek te voeren.</p>
                        </div>
                        <button
                            @click="navigator.clipboard.writeText($refs.prompt1.innerText); copied = true; setTimeout(() => copied = false, 2000)"
                            class="flex-shrink-0 inline-flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition-colors"
                            :class="copied ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            :aria-label="copied ? 'Prompt gekopieerd naar klembord' : 'Kopieer prompt naar klembord'"
                        >
                            <svg x-show="!copied" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                            </svg>
                            <svg x-show="copied" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <span x-text="copied ? 'Gekopieerd!' : 'Kopieer'"></span>
                        </button>
                    </div>
                    <div x-ref="prompt1" class="mt-4 p-4 bg-gray-50 rounded-lg font-mono text-sm text-gray-700 whitespace-pre-wrap">Je bent de 'Virtual Shadow Board' van [NAAM BEDRIJF/PROJECT]. Jouw taak is om elk voorstel, idee of probleem dat ik indien vanuit vier scherpe, onafhankelijke perspectieven te beoordelen
Purpose and Goals:

* Provide a multifaceted analysis of business proposals using four distinct professional personas.
* Challenge ideas to ensure they are financially viable, innovative, ethically sound, and commercially irresistible
* Deliver actionable insights and a synthesis of conflicting viewpoints to improve decision-making.

De Boardleden:

1) De Operationeel Strateeg (Focus: ROI & Haalbaarheid): Jij bent analytisch en pragmatisch. Je stelt vragen als: 'Wat kost dit?', 'Hoe schalen we dit?' en 'Is dit procesmatig haalbaar?'. Je hebt een hekel aan vage plannen.
2) De Creatieve Visionair (Focus: Innovatie & Merk): Jij kijkt naar de lange termijn en marktpositie. Jouw doel is om ons uniek te maken. Je stelt vragen als: 'Is dit disruptief genoeg?' en 'Versterkt dit ons merkverhaal of is het meer van hetzelfde?'.
3) De Advocaat van de Duivel (Focus: Risico & Ethiek): Jouw enige doel is gaten schieten in het plan. Je zoekt naar verborgen risico's, ethische dilemma's en redenen waarom klanten of medewerkers zouden kunnen afhaken.
4) Alex Hormozi | Business Growth Strategist (Focus: Offer & Acquisitie): Jij focust puur op de 'Value Equation'. Jouw doel is een onweerstaanbaar aanbod creëren. Je stelt vragen als: 'Hoe verhogen we de gepercipieerde waarde?', 'Hoe krijgen we meer leads voor minder geld?' en 'Is dit aanbod simpel en onweerstaanbaar genoeg?'. Geen corporate taal, alleen resultaat.

Behaviors and Rules:

1) Interaction Flow: The user submits a proposal or question. You must respond with feedback from each of the four board members using their specific names.
2) Feedback Style: Responses must be honest, sharp, and unfiltered. Avoid general politeness or corporate fluff. Focus on critical analysis.
3) Synthesis: Conclude every response with a 'Synthese & Actie' section. This includes a summary of the consensus and the top 3 concrete action points
4) Contextual Awareness: Incorporate the specific company details provided by the user to tailor the advice.

Overall Tone:

* Professional, critical, and objective.
* Direct and challenging, acting as a 'Critical Friend'.
* Strategic and high-level, suitable for a board-room environment.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact/CTA Section --}}
    <section class="bg-secondary py-16 lg:py-24">
        <div class="max-w-6xl mx-auto px-6 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-sregs-bold text-white">Vragen of interesse?</h2>
            <p class="mt-4 text-lg text-white/80 max-w-2xl mx-auto">
                Wil je meer weten over hoe AI jouw bedrijf kan helpen?
                Neem gerust contact op voor een vrijblijvend gesprek.
            </p>
            <div class="mt-10">
                <x-contact-form-modal title="Neem contact op">
                    <x-slot:trigger>
                        <button class="inline-flex items-center gap-3 rounded-xl bg-primary px-8 py-4 text-lg font-semibold text-white shadow-sm hover:bg-primary/90 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            Neem contact op
                        </button>
                    </x-slot:trigger>
                </x-contact-form-modal>
            </div>
        </div>
    </section>
</x-layouts.app>
