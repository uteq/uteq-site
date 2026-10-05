<x-mail::message>
# {{ $k->aanvraag['bouwzin'] ?? 'Wachtlijst' }}

**Status:** {{ $k->status }} · **Bron:** {{ $k->bron }}

<x-mail::table>
| Vraag | Antwoord |
|:--|:--|
@foreach ($k->aanvraagRegels() as $label => $antwoord)
| {{ $label }} | {{ str_replace(["\r", "\n", '|'], [' ', ' ', '/'], $antwoord) }} |
@endforeach
| E-mail | {{ $k->email }} |
| Persoonlijke dossierlink | {{ $k->dossierUrl() }} |
</x-mail::table>

<x-mail::button :url="route('keuring.beheer')">
Naar het overzicht
</x-mail::button>
</x-mail::message>
