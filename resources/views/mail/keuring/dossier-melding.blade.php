<x-mail::message>
# Bouwdossier van {{ $k->bedrijf }}

**Personen:** {{ $k->personen }} · **Totaal:** €{{ $k->totaal() }} excl. btw

@foreach ($k->dossierRegels() as $blok => $regels)
## {{ $loop->index }}. {{ $blok }}

<x-mail::table>
| Vraag | Antwoord |
|:--|:--|
@foreach ($regels as $label => $antwoord)
| {{ $label }} | {{ str_replace(["\r", "\n", '|'], [' ', ' ', '/'], $antwoord) }} |
@endforeach
</x-mail::table>

@endforeach
<x-mail::button :url="route('keuring.beheer')">
Naar het overzicht
</x-mail::button>
</x-mail::message>
