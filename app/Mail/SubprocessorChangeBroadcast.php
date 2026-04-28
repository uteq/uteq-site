<?php

namespace App\Mail;

use App\Models\SubprocessorChange;
use App\Models\SubprocessorSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class SubprocessorChangeBroadcast extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /** @param Collection<int, SubprocessorChange> $changes */
    public function __construct(
        public Collection $changes,
        public SubprocessorSubscription $subscription,
    ) {
    }

    public function envelope(): Envelope
    {
        $count = $this->changes->count();
        $label = $count === 1 ? 'wijziging' : 'wijzigingen';

        return new Envelope(
            subject: "UTEQ Subverwerkerlijst: {$count} {$label}",
            from: new \Illuminate\Mail\Mailables\Address('info@uteq.nl', 'UTEQ'),
            replyTo: [new \Illuminate\Mail\Mailables\Address('info@uteq.nl', 'UTEQ')],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.subprocessor-change-broadcast',
            with: [
                'changes' => $this->changes,
                'unsubscribeUrl' => route('juridisch.subverwerkers.unsubscribe', $this->subscription->unsubscribe_token),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
