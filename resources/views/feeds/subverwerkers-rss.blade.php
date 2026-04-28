<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>UTEQ Subverwerkerlijst, wijzigingen</title>
        <link>{{ url('/juridisch/subverwerkers') }}</link>
        <atom:link href="{{ url(route('juridisch.subverwerkers.rss', [], false)) }}" rel="self" type="application/rss+xml" />
        <description>Wijzigingen in de subverwerkers van UTEQ. Onderdeel van de DPA-UTEQ Bijlage A.</description>
        <language>nl</language>
        <lastBuildDate>{{ now()->toRfc2822String() }}</lastBuildDate>
        @foreach ($changes as $change)
        <item>
            <title>{{ ucfirst($change->change_type) }}: {{ Str::limit($change->summary, 80) }}</title>
            <link>{{ url('/juridisch/subverwerkers') }}#change-{{ $change->id }}</link>
            <guid isPermaLink="false">subverwerkers-change-{{ $change->id }}</guid>
            <pubDate>{{ ($change->published_at ?? $change->created_at)->toRfc2822String() }}</pubDate>
            <description><![CDATA[{{ $change->summary }}@if ($change->details)

{{ $change->details }}@endif

Ingangsdatum: {{ $change->effective_from->translatedFormat('j F Y') }}.]]></description>
        </item>
        @endforeach
    </channel>
</rss>
