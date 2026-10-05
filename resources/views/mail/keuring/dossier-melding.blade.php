<x-mail::message>
# Bouwdossier van {{ \App\Models\Keuring::md($k->bedrijf) }}

**Personen:** {{ $k->personen }} · **Totaal:** €{{ $k->totaal() }} excl. btw

@foreach ($k->dossierRegels() as $blok => $regels)
## {{ $loop->index }}. {{ $blok }}

<x-mail::table>
| Vraag | Antwoord |
|:--|:--|
@foreach ($regels as $label => $antwoord)
| {{ $label }} | {{ \App\Models\Keuring::md($antwoord) }} |
@endforeach
</x-mail::table>

@endforeach
<x-mail::button :url="route('keuring.beheer')">
Naar het overzicht
</x-mail::button>
</x-mail::message>
