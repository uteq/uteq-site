<x-mail::message>
# Wijziging in de UTEQ Subverwerkerlijst

Hieronder de wijzigingen die per onderstaande ingangsdatums actueel worden. De volledige lijst staat op uteq.nl/juridisch/subverwerkers.

@foreach ($changes as $change)
**{{ $change->effective_from->translatedFormat('j F Y') }} · {{ ucfirst($change->change_type) }}**

{{ $change->summary }}

@if ($change->details)
{{ $change->details }}

@endif
@endforeach

<x-mail::button url="https://uteq.nl/juridisch/subverwerkers">
Bekijk de actuele lijst
</x-mail::button>

Heb je vragen of bezwaren? Mail naar info@uteq.nl.

Groet,
UTEQ

<x-slot:subcopy>
Wil je geen wijzigingen meer ontvangen, gebruik dan deze link: [{{ $unsubscribeUrl }}]({{ $unsubscribeUrl }})
</x-slot:subcopy>
</x-mail::message>
