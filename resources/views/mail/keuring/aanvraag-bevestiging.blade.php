<x-mail::message>
# Je bent aangemeld

Bedankt, {{ $k->voornaam() }}. Je hebt een plek op de avond{{ $k->personen === 2 ? ', samen met je collega' : '' }}.

1. Je krijgt de factuur van Uteq: €{{ $k->totaal() }} excl. btw. Dat bedrag geldt als voucher.
2. Heb je iets gebouwd met AI? Neem het mee op je laptop of telefoon. Niets gebouwd is ook goed.
3. Kom naar Lokaal55. De deur is open vanaf 17:30.

**Bouwkundige keuring**
Woensdag 28 oktober 2026, van 17:30 tot 21:30
Lokaal55, Oude Oppenhuizerweg 55, 8606 JB Sneek

Groet,
Nathan Jansen (Uteq) en Johan Oenema (Growth AI)
</x-mail::message>
