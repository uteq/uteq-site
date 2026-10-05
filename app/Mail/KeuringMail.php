<?php

namespace App\Mail;

use App\Models\Keuring;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Mail;

/** Alle mails van de bouwkundige keuring: één view per soort in resources/views/mail/keuring/. */
class KeuringMail extends Mailable
{
    public function __construct(public Keuring $keuring, public string $soort, public string $onderwerp) {}

    /** Versturen mag nooit een opgeslagen aanvraag of dossier laten mislukken. */
    public static function stuur(string|array $aan, Keuring $keuring, string $soort, string $onderwerp): void
    {
        try {
            Mail::to($aan)->send(new static($keuring, $soort, $onderwerp));
        } catch (\Throwable $e) {
            report($e);
        }
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->onderwerp,
            replyTo: in_array($this->soort, ['aanvraag-melding', 'dossier-melding'])
                ? [new Address($this->keuring->email, (string) $this->keuring->naam)]
                : [new Address('info@uteq.nl', 'Uteq')],
        );
    }

    public function content(): Content
    {
        return new Content(markdown: "mail.keuring.{$this->soort}", with: ['k' => $this->keuring]);
    }
}
