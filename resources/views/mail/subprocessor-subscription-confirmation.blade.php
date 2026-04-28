<x-mail::message>
# Bevestig je aanmelding

{{ $name ? "Hoi {$name}," : 'Hoi,' }}

Je hebt je aangemeld om wijzigingen in de UTEQ Subverwerkerlijst per e-mail te ontvangen. Klik op onderstaande link om je aanmelding te bevestigen.

<x-mail::button :url="$confirmUrl">
Bevestig aanmelding
</x-mail::button>

Als je dit niet zelf was, hoef je niets te doen. Zonder bevestiging worden er geen mails verstuurd.

Vragen? Mail naar info@uteq.nl.

Groet,
UTEQ

<x-slot:subcopy>
Wil je later afmelden, gebruik dan deze link: [{{ $unsubscribeUrl }}]({{ $unsubscribeUrl }})
</x-slot:subcopy>
</x-mail::message>
