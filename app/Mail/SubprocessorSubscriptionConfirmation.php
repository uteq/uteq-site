<?php

namespace App\Mail;

use App\Models\SubprocessorSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubprocessorSubscriptionConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public SubprocessorSubscription $subscription)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bevestig je aanmelding voor de UTEQ Subverwerkerlijst',
            from: new \Illuminate\Mail\Mailables\Address('info@uteq.nl', 'UTEQ'),
            replyTo: [new \Illuminate\Mail\Mailables\Address('info@uteq.nl', 'UTEQ')],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.subprocessor-subscription-confirmation',
            with: [
                'confirmUrl' => route('juridisch.subverwerkers.confirm', $this->subscription->confirmation_token),
                'unsubscribeUrl' => route('juridisch.subverwerkers.unsubscribe', $this->subscription->unsubscribe_token),
                'name' => $this->subscription->name,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
