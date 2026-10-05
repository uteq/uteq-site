<?php

// Bouwkundige keuring, 28 oktober 2026. Vragen komen letterlijk uit het bouwdossier-format.
// De teller, de kop en open/dicht staan in de database en pas je aan op /keuring/beheer.

$ja = ['Ja', 'Nee', 'Weet ik niet'];

return [

    'ontvangers' => array_filter(explode(',', env('KEURING_ONTVANGERS', 'info@uteq.nl'))),
    'keuringsadres' => env('KEURING_ADRES', 'keuring@uteq.nl'),
    'github_account' => env('KEURING_GITHUB', 'uteq-keuring'),

    // Na deze momenten (Europe/Amsterdam) gaat het formulier vanzelf dicht.
    'aanvragen_tot' => '2026-10-15 00:00',
    'dossier_tot' => '2026-10-20 00:00',

    'plaatsen' => 10,
    'prijs' => 99,

    // [voor de regelafbreking, na de regelafbreking, het groene woord]
    'koppen' => [
        1 => ['Jij ziet de gevel.', 'Wij zien het', 'fundament.'],
        2 => ['', 'Wat zien twee specialisten in jouw AI dat jij', 'mist?'],
        3 => ['Een huis koop je niet zonder keuring.', 'Je AI', 'wel?'],
    ],

    'statussen' => [
        'aangevraagd', 'toegelaten', 'afgewezen', 'wachtlijst', 'dossier binnen',
        'gefactureerd', 'betaald', 'gekeurd', 'nabespreking gepland',
    ],

    // Deel A: de aanvraag. type: text, email, tel, url, number, textarea, select, radio, checkbox.
    'aanvraag' => [
        'naam' => ['label' => 'Naam', 'type' => 'text', 'required' => true, 'half' => true, 'autocomplete' => 'name'],
        'functie' => ['label' => 'Functie', 'type' => 'text', 'half' => true, 'autocomplete' => 'organization-title'],
        'email' => ['label' => 'E-mail', 'type' => 'email', 'required' => true, 'half' => true, 'autocomplete' => 'email'],
        'telefoon' => ['label' => 'Telefoon', 'type' => 'tel', 'half' => true, 'autocomplete' => 'tel'],
        'bedrijf' => ['label' => 'Bedrijf', 'type' => 'text', 'required' => true, 'half' => true, 'autocomplete' => 'organization'],
        'website' => ['label' => 'Website', 'type' => 'url', 'half' => true, 'autocomplete' => 'url'],
        'branche' => ['label' => 'Branche', 'type' => 'select', 'required' => true, 'options' => [
            'Bouw en installatie', 'Zakelijke dienstverlening', 'Handel en webshop', 'Zorg en welzijn', 'Productie en logistiek', 'Anders',
        ]],
        'medewerkers' => ['label' => 'Hoeveel mensen werken er?', 'type' => 'radio', 'required' => true, 'options' => ['Alleen ik', '2-9', '10-49', '50+']],
        'bouwzin' => ['label' => 'Je bouwzin', 'type' => 'textarea', 'required' => true, 'rows' => 3,
            'hint' => 'Ik bouwde … zodat …',
            'placeholder' => "Ik bouwde een planbord zodat onze 14 monteurs 's ochtends zelf zien waar ze heen moeten."],
        'gebouwd_met' => ['label' => 'Gebouwd met', 'type' => 'checkbox', 'required' => true, 'options' => [
            'ChatGPT of eigen GPT', 'Claude', 'Lovable', 'Cursor', 'Make, Zapier of n8n', 'Copilot', 'Anders',
        ]],
        'gebruikers' => ['label' => 'Wie gebruikt het?', 'type' => 'radio', 'required' => true, 'options' => ['Alleen ik', 'Mijn team', 'Onze klanten']],
        'gebruikers_aantal' => ['label' => 'En hoeveel mensen?', 'type' => 'number', 'required' => true],
        'belang' => ['label' => 'Hoe belangrijk is het voor je bedrijf?', 'type' => 'radio', 'required' => true, 'options' => ['Handig', 'Belangrijk', 'We kunnen niet meer zonder']],
        'over_een_jaar' => ['label' => 'Wat moet het over een jaar kunnen?', 'type' => 'textarea', 'required' => true, 'rows' => 3],
    ],

    // Deel B: het bouwdossier, in negen blokken.
    'dossier' => [
        'Je plek en de factuur' => [
            'personen' => ['label' => 'Met hoeveel personen kom je? (€99 excl. btw per persoon, hooguit twee)', 'type' => 'radio', 'required' => true, 'options' => ['Alleen', 'Met een collega']],
            'collega' => ['label' => 'Naam en functie van je collega', 'type' => 'text', 'required_if' => ['personen', 'Met een collega']],
            'factuur' => ['label' => 'Bedrijfsnaam, adres en e-mail voor de factuur', 'type' => 'textarea', 'required' => true, 'rows' => 4],
            'btw_referentie' => ['label' => 'Btw-nummer en referentie', 'type' => 'text'],
        ],
        'Het bouwwerk' => [
            'b_naam' => ['label' => 'Hoe heet wat je hebt gebouwd?', 'type' => 'text'],
            'b_wat' => ['label' => 'Wat doet het?', 'type' => 'textarea', 'rows' => 4, 'hint' => '3 tot 5 zinnen'],
            'b_onderdelen' => ['label' => 'Welke onderdelen zitten erin?', 'type' => 'checkbox', 'options' => [
                'Inloggen', 'Klantgegevens', 'Planning', 'Offertes en facturen', 'Betalingen', 'Documenten', 'AI-assistent of chatbot', 'Automatisering', 'Koppelingen', 'Anders',
            ]],
            'b_sinds' => ['label' => 'Sinds wanneer in gebruik?', 'type' => 'text', 'placeholder' => 'Bijvoorbeeld maart 2026', 'half' => true],
            'b_hoe_vaak' => ['label' => 'En hoe vaak?', 'type' => 'radio', 'options' => ['Dagelijks', 'Wekelijks', 'Af en toe'], 'half' => true],
        ],
        'De materialen' => [
            'b_draait' => ['label' => 'Waar draait het?', 'type' => 'checkbox', 'options' => ['Lovable', 'Vercel', 'Make, Zapier of n8n', 'ChatGPT', 'Eigen server', 'Weet ik niet', 'Anders']],
            'b_gegevens_waar' => ['label' => 'Waar staan de gegevens?', 'type' => 'checkbox', 'options' => ['Supabase', 'Firebase', 'Airtable', 'Google Sheets', 'Weet ik niet', 'Anders']],
            'b_koppelingen' => ['label' => 'Gekoppeld aan andere systemen?', 'type' => 'text', 'placeholder' => 'Bijvoorbeeld Exact, Google Agenda of Mollie'],
        ],
        'De gegevens' => [
            'b_gegevens' => ['label' => 'Welke gegevens staan erin?', 'type' => 'checkbox', 'options' => [
                'Namen en contactgegevens', 'Adressen', 'Financiële gegevens', 'Gezondheidsgegevens', 'Sleutels van andere diensten', 'Geen persoonsgegevens',
            ]],
            'b_toegang' => ['label' => 'Wie kan erin?', 'type' => 'checkbox', 'options' => ['Alleen ik', 'Mijn team (met inlog)', 'Klanten (met inlog)', 'Iedereen met de link', 'Weet ik niet']],
        ],
        'Het onderhoud' => [
            'b_wie_past_aan' => ['label' => 'Wie past het aan?', 'type' => 'checkbox', 'options' => ['Ik', 'Een collega', 'Een externe partij']],
            'b_versiebeheer' => ['label' => 'Gebruik je versiebeheer (zoals GitHub)?', 'type' => 'radio', 'options' => $ja],
            'b_backups' => ['label' => 'Zijn er back-ups?', 'type' => 'radio', 'options' => ['Ja, en terugzetten is getest', 'Ja, nooit getest', 'Nee', 'Weet ik niet']],
        ],
        'Zorgen en ambitie' => [
            'b_wakker' => ['label' => 'Waar lig je wakker van?', 'type' => 'textarea', 'rows' => 3],
            'b_mis' => ['label' => 'Wat ging er al eens mis?', 'type' => 'textarea', 'rows' => 3],
            'b_hulp' => ['label' => 'Als je hulp had, wat zou je dan als eerste laten bouwen?', 'type' => 'textarea', 'rows' => 3],
        ],
        'Toegang voor de keuring' => [
            'b_link' => ['label' => 'Link naar je app of gedeelde GPT (als die er is)', 'type' => 'url'],
            'b_uitgenodigd' => ['label' => 'Ik heb :keuringsadres uitgenodigd als gebruiker', 'type' => 'radio', 'required' => true, 'options' => ['Gedaan', 'Kan niet bij mijn oplossing']],
            'b_opname' => ['label' => 'Schermopname van 2 tot 3 minuten, of schermafbeeldingen van je automatisering', 'type' => 'url', 'required' => true, 'hint' => 'Een link naar Loom, Drive of WeTransfer'],
            'b_code' => ['label' => 'Code (mag, hoeft niet)', 'type' => 'text', 'hint' => 'Geef :github leestoegang op GitHub en zet hier de naam van de repository'],
        ],
        'De avond' => [
            'b_keuren_hoe' => ['label' => 'Hoe wil je gekeurd worden?', 'type' => 'radio', 'required' => true, 'options' => ['Alleen in mijn eigen rapport', 'Anoniem op het scherm', 'Live, met naam']],
            'b_dieet' => ['label' => 'Dieetwensen of allergieën?', 'type' => 'text'],
            'b_bouwtafel' => ['label' => 'Aan welke bouwtafel wil je?', 'type' => 'radio', 'options' => ['Klantportalen', 'Planning en uren', 'Offertes en facturen', 'AI-assistenten', 'Automatisering']],
            'b_leren' => ['label' => 'Wat kun jij andere ondernemers leren?', 'type' => 'textarea', 'rows' => 3],
        ],
        'Toestemming' => [
            'b_toestemming' => ['label' => 'Jullie bekijken alleen wat ik instuur en melden lekken alleen aan mij.', 'type' => 'accept', 'required' => true],
        ],
    ],
];
