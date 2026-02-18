<x-layouts.app :nav="false" title="AI en Programmeeronderwijs | Firda Studiedag SD | UTEQ" metaDescription="Na 20 jaar programmeren laat ik AI het werk doen. Op de studiedag Software Development bij Firda liet ik zien wat dat betekent voor het onderwijs. Bekijk de materialen.">

    @push('head')
        <meta property="og:title" content="AI en Programmeeronderwijs | Firda Studiedag SD">
        <meta property="og:description" content="Na 20 jaar programmeren laat ik AI het werk doen. Op de studiedag bij Firda liet ik zien wat dat betekent voor het onderwijs.">
        <meta property="og:image" content="{{ url('/images/firda/nathan-keynote.jpeg') }}">
        <meta property="og:url" content="{{ url('/firda') }}">
        <meta property="og:type" content="article">
        <meta name="twitter:card" content="summary_large_image">

        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "EducationEvent",
            "name": "Studiedag Software Development | AI en Programmeeronderwijs",
            "description": "Ochtend-keynote over de impact van AI op het programmeeronderwijs bij Firda Leeuwarden.",
            "performer": {
                "@@type": "Person",
                "name": "Nathan Jansen",
                "jobTitle": "AI Business Architect",
                "worksFor": { "@@type": "Organization", "name": "UTEQ" }
            },
            "organizer": { "@@type": "Organization", "name": "Firda" },
            "location": { "@@type": "Place", "name": "Firda Leeuwarden", "address": "Leeuwarden, Nederland" },
            "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
            "image": "{{ url('/images/firda/nathan-keynote.jpeg') }}"
        }
        </script>
    @endpush

    {{-- Hero Section --}}
    <section class="relative bg-floral-white pt-28 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/[0.03] to-transparent pointer-events-none"></div>

        <div class="relative max-w-6xl mx-auto px-6 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div data-aos="fade-up">
                    <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-sm font-medium tracking-wide">
                        Firda Studiedag SD
                    </span>
                    <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-sregs-bold text-secondary leading-tight">
                        Bedankt voor het open gesprek!
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 leading-relaxed max-w-lg">
                        Fijn dat er zo'n open gesprek ontstond over de veranderende wereld van de software developer en hoe het speelveld verschuift met de snelle ontwikkeling van AI-tools. Hier vind je de materialen uit de sessie terug.
                    </p>
                    <div class="mt-10 flex flex-wrap gap-4">
                        <a href="#materialen" class="inline-flex items-center gap-3 rounded-xl bg-primary px-8 py-4 text-lg font-semibold text-white shadow-sm hover:bg-primary/90 hover:shadow-md transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                            Bekijk materialen
                        </a>
                        <a href="/firda/presentatie" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 rounded-xl border-2 border-secondary/20 px-8 py-4 text-lg font-semibold text-secondary hover:border-secondary/40 transition-all">
                            Bekijk presentatie
                        </a>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="150">
                    <div class="relative overflow-hidden rounded-2xl shadow-xl ring-1 ring-black/5">
                        <img src="/images/firda/nathan-keynote.jpeg" alt="Nathan Jansen presenteert op de Firda studiedag Software Development" class="w-full h-auto object-cover" />
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-6 pt-16">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-semibold text-white">Nathan Jansen</p>
                                    <p class="text-sm text-white/70">UTEQ &middot; Ochtend-keynote</p>
                                </div>
                                <a href="https://www.linkedin.com/in/nathanjansen/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-lg bg-white/15 backdrop-blur-sm border border-white/20 px-4 py-2 text-sm font-medium text-white hover:bg-white/25 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                    LinkedIn
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Kernpunten Section --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="max-w-2xl" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-sregs-bold text-secondary">Wat ik jullie heb laten zien</h2>
                <p class="mt-4 text-gray-600">
                    Na 20 jaar programmeren heb ik mijn toetsenbord weggegooid. Letterlijk. Ik programmeer niet meer zelf. AI doet dat voor mij. Wat betekent dat voor jullie studenten?
                </p>
            </div>

            <div class="mt-12 grid md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="rounded-2xl border border-gray-200 bg-white p-8">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25a2.25 2.25 0 0 1-2.25-2.25v-2.25Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary">Programmeren is niet meer nodig</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed text-sm">
                        Van Bits &amp; Bytes naar Assembly, van C naar Python. Elke generatie maakte de vorige onzichtbaar. AI is de volgende laag. En deze spreekt Nederlands.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100" class="rounded-2xl border border-gray-200 bg-white p-8">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.58-5.84a14.927 14.927 0 0 1-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary">De developer wordt architect</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed text-sm">
                        Mijn werk is nu plannen maken en controleren of AI die plannen goed uitvoert. Niet minder vakmanschap, maar ander vakmanschap. Ik blijf aan het stuur. AI doet de implementatie.
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="rounded-2xl border border-gray-200 bg-white p-8">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-secondary">Het curriculum moet mee</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed text-sm">
                        Prompt engineering, AI orkestratie, code review van AI output. Dit staat nog in geen enkel MBO curriculum. De vraag is niet of dit gebeurt. De vraag is wanneer jullie klaar zijn.
                    </p>
                </div>
            </div>

            <div class="mt-12 rounded-2xl bg-gray-50 border border-gray-200 p-8 md:p-10" data-aos="fade-up">
                <blockquote class="text-xl md:text-2xl font-sregs-bold text-secondary leading-snug max-w-3xl">
                    "Elk vak transformeert. Geen enkel vak verdwijnt. Maar de docent die dit negeert, leidt op voor een wereld die niet meer bestaat."
                </blockquote>
            </div>
        </div>
    </section>

    {{-- Materialen Section --}}
    <section id="materialen" class="bg-gray-50 py-16 lg:py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="max-w-2xl" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-sregs-bold text-secondary">Materialen</h2>
                <p class="mt-4 text-gray-600">
                    De interactieve tools uit de presentatie, vrij te gebruiken en te delen.
                </p>
            </div>

            <div class="mt-12 grid md:grid-cols-2 gap-8">
                {{-- Presentatie Card --}}
                <div data-aos="fade-up" class="group rounded-2xl border border-gray-200 bg-white p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-secondary">AI en Programmeeronderwijs</h3>
                            <p class="mt-2 text-gray-600 leading-relaxed">
                                De volledige interactieve presentatie. Van de eerste regel code tot AI die complete applicaties bouwt. Wat betekent dat voor jullie lessen?
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-400">
                                <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-2.5 py-0.5 text-xs font-medium">
                                    Interactief
                                </span>
                            </div>
                            <a href="/firda/presentatie" target="_blank" rel="noopener noreferrer" class="mt-5 inline-flex items-center gap-2 rounded-lg bg-secondary px-5 py-2.5 text-sm font-medium text-white hover:bg-secondary/80 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                                Open presentatie
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Opus vs Lokaal Card --}}
                <div data-aos="fade-up" data-aos-delay="100" class="group rounded-2xl border border-gray-200 bg-white p-8 hover:shadow-xl hover:border-primary/20 transition-all duration-300">
                    <div class="flex items-start gap-5">
                        <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-secondary">Opus 4.6 vs. Lokaal Model</h3>
                            <p class="mt-2 text-gray-600 leading-relaxed">
                                Vergelijk de output van Claude Opus 4.6 met een lokaal draaiend model. Zie het verschil in kwaliteit en snelheid met je eigen ogen.
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-sm text-gray-400">
                                <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-2.5 py-0.5 text-xs font-medium">
                                    Interactief
                                </span>
                            </div>
                            <a href="/firda/opus-vs-lokaal" target="_blank" rel="noopener noreferrer" class="mt-5 inline-flex items-center gap-2 rounded-lg bg-secondary px-5 py-2.5 text-sm font-medium text-white hover:bg-secondary/80 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                                Open vergelijking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Inhoud Section --}}
    <section class="bg-white py-16 lg:py-24">
        <div class="max-w-3xl mx-auto px-6">
            <div data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-sregs-bold text-secondary">De impact van AI op het programmeeronderwijs</h2>
                <p class="mt-6 text-gray-600 leading-relaxed">
                    Ik heb 20 jaar geprogrammeerd. Van kleine games tot webshops met 600.000+ artikelen. Maar ik programmeer niet meer zelf. Dat is geen luiheid. Dat is de realiteit. AI schrijft code sneller, consistenter en vaak beter dan ik het handmatig deed.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Op de studiedag Software Development bij Firda heb ik docenten laten zien wat dat concreet betekent. Niet vanuit theorie, maar vanuit mijn dagelijkse praktijk als AI Business Architect.
                </p>
            </div>

            {{-- Abstractielagen --}}
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl font-sregs-bold text-secondary">Elke generatie maakt de vorige onzichtbaar</h3>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    In de jaren '70 had je duizenden regels code nodig voor wat nu in één regel kan. Over vijf jaar schrijf je één zin in het Nederlands voor wat nu honderd regels code kost.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Bits &amp; Bytes werden Assembly. Assembly werd C. C werd Python en JavaScript. Elke laag maakte de vorige onzichtbaar. Niemand mist Assembly. Niemand gaat Python missen. AI is de volgende abstractielaag. En deze spreekt Nederlands.
                </p>
            </div>

            {{-- Wat ik nu doe --}}
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl font-sregs-bold text-secondary">Van code schrijven naar systemen aansturen</h3>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Mijn werk bestaat nu uit vier stappen. Eerst definieer ik wat ik wil: wat moet het systeem doen, voor wie, welk probleem lost het op? Dan plan ik de architectuur: welke componenten, hoe hangen ze samen, wat zijn de grenzen? Vervolgens bepaal ik de juiste pakketten en regels die ik de AI meegeef. En als laatste test ik of het klopt: doet het wat het moet doen, is het veilig, schaalt het?
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    De 1% van het werk die overblijft is 100% van de waarde. Begrijpen en beoordelen blijft. Uitvoeren verdwijnt.
                </p>
            </div>

            {{-- Analogieën --}}
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl font-sregs-bold text-secondary">Elk vak transformeert. Geen enkel vak verdwijnt.</h3>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Dit hebben we eerder gezien. De rekenmachine verving het hoofdrekenen, maar wiskunde bleef. Niemand leert nog staartdelingen, maar iedereen moet nog steeds begrijpen wat je deelt en waarom.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Spellingcontrole verschoof de focus van foutloos spellen naar helder communiceren. GPS verving kaartlezen, maar weten waar je heen wilt bleef. En herkennen dat de GPS fout zit werd een hele nieuwe skill. Dat is precies wat het controleren van AI straks is.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    In de fotografie verdween de doka en werd de technische drempel nul. Maar er kwamen meer fotografen, niet minder. De waarde verschoof van techniek naar visie en creativiteit. Precies wat er met developers gaat gebeuren.
                </p>
            </div>

            {{-- Nieuw vakmanschap --}}
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl font-sregs-bold text-secondary">Wat blijft en wat erbij komt</h3>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Logisch denken blijft onmisbaar. Patronen herkennen, systemen doorgronden, oorzaak en gevolg begrijpen. AI kan code maken, maar kan niet beoordelen of de logica klopt voor jouw specifieke situatie. Het gaat niet meer om hoe je code schrijft, maar waarom een systeem zo werkt.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Daar komt nieuw vakmanschap bij. Prompt engineering: het verschil tussen een vaag verzoek en een scherpe opdracht is het verschil tussen rommel en bruikbare code. AI resultaten beoordelen: AI maakt code met 100% zelfvertrouwen, ook als het fout is. Iemand moet dat zien. En ethiek: als AI medische software bouwt, wie is verantwoordelijk als het misgaat?
                </p>
            </div>

            {{-- Urgentie --}}
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl font-sregs-bold text-secondary">De kloof groeit elke dag</h3>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Dit staat nog in geen enkel MBO curriculum. Een student die nu begint aan een driejarige opleiding studeert af in 2029. In die wereld is AI standaard gereedschap. Elke dag dat het curriculum niet verandert, groeit de kloof.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Het gaat niet om of dit gebeurt. Het gaat om wanneer jullie klaar zijn.
                </p>
            </div>

            {{-- Over de spreker --}}
            <div class="mt-16 rounded-2xl bg-gray-50 border border-gray-200 p-8 md:p-10" data-aos="fade-up">
                <div class="flex items-start gap-6">
                    <img src="/images/firda/nathan-keynote.jpeg" alt="Nathan Jansen" class="w-20 h-20 rounded-xl object-cover flex-shrink-0 hidden sm:block" />
                    <div>
                        <h3 class="text-lg font-semibold text-secondary">Over Nathan Jansen</h3>
                        <p class="mt-2 text-gray-600 leading-relaxed text-sm">
                            AI Business Architect bij UTEQ. Na 20 jaar software bouwen laat hij AI nu de code schrijven. Zijn werk: mooie plannen maken en controleren of die plannen goed zijn uitgevoerd. Nathan spreekt regelmatig over de impact van AI op het vakgebied.
                        </p>
                        <a href="https://www.linkedin.com/in/nathanjansen/" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-2 text-sm font-medium text-primary hover:text-primary/80 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            Bekijk LinkedIn profiel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact/CTA Section --}}
    <section class="relative bg-secondary py-16 lg:py-24 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-primary/[0.03] rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-6xl mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-sregs-bold text-white">Vragen of interesse?</h2>
                <p class="mt-4 text-lg text-white/70 max-w-2xl mx-auto leading-relaxed">
                    Wil je meer weten over hoe AI een rol kan spelen in jullie onderwijs?
                    Neem gerust contact op of plan direct een vrijblijvend gesprek in.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 max-w-3xl mx-auto">
                {{-- Bericht sturen --}}
                <div data-aos="fade-up" class="rounded-2xl bg-white/[0.07] backdrop-blur-sm border border-white/10 p-8 text-center hover:bg-white/[0.1] transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-primary/20 flex items-center justify-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-xl font-semibold text-white">Stuur een bericht</h3>
                    <p class="mt-2 text-white/60 text-sm leading-relaxed">
                        Stel je vraag en we reageren binnen 24 uur.
                    </p>
                    <div class="mt-6">
                        <button @click="$dispatch('open-contact-modal')" class="inline-flex items-center gap-2 rounded-xl bg-white/10 border border-white/20 px-6 py-3 text-sm font-semibold text-white hover:bg-white/20 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Schrijf een bericht
                        </button>
                    </div>
                </div>

                {{-- Afspraak plannen --}}
                <div data-aos="fade-up" data-aos-delay="100" class="rounded-2xl bg-primary/10 border border-primary/20 p-8 text-center hover:bg-primary/[0.15] transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-primary/20 flex items-center justify-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="mt-5 text-xl font-semibold text-white">Plan een gesprek</h3>
                    <p class="mt-2 text-white/60 text-sm leading-relaxed">
                        Kies direct een moment dat jou uitkomt.
                    </p>
                    <div class="mt-6">
                        <a href="https://calendly.com/uteq/ai-strategie-workshop" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-xl bg-primary px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary/20 hover:bg-primary/90 hover:shadow-xl hover:shadow-primary/30 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            Plan een afspraak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Modal --}}
    <div x-data x-on:open-contact-modal.window="document.getElementById('firda-contact-modal-trigger').click()">
        <x-contact-form-modal title="Neem contact op">
            <x-slot:trigger>
                <button id="firda-contact-modal-trigger" class="sr-only">Open contact formulier</button>
            </x-slot:trigger>
        </x-contact-form-modal>
    </div>
</x-layouts.app>
