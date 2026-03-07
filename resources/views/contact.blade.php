<x-mail::message>
# E-mail van {{ $name }}

<p>{{ $content }}</p>

Naam: {{ $name }}<br />
Bedrijfsnaam: {{ $company }}<br />
E-mailadres: {{ $email }}<br />
Telefoonnummer: {{ $phone }}<br />
Aantal medewerkers: {{ $employees ?? '-' }}<br />
Budget-indicatie: {{ $budget ?? '-' }}

</x-mail::message>
