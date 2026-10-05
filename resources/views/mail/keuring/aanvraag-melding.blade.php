<x-mail::message>
# {{ \App\Models\Keuring::md($k->aanvraag['bouwzin'] ?? 'Wachtlijst') }}

**Status:** {{ $k->status }} · **Bron:** {{ \App\Models\Keuring::md($k->bron) }}

<x-mail::table>
| Vraag | Antwoord |
|:--|:--|
@foreach ($k->aanvraagRegels() as $label => $antwoord)
| {{ $label }} | {{ \App\Models\Keuring::md($antwoord) }} |
@endforeach
| E-mail | {{ $k->email }} |
| Persoonlijke dossierlink | {{ $k->dossierUrl() }} |
</x-mail::table>

<x-mail::button :url="route('keuring.beheer')">
Naar het overzicht
</x-mail::button>
</x-mail::message>
