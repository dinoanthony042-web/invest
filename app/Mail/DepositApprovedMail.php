<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\DepositRequest;

class DepositApprovedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $deposit;

    /**
     * Create a new message instance.
     */
    public function __construct(DepositRequest $deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Deposit Approved - Bridgefield Capital Group',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.deposit-approved',
            with: [
                'deposit' => $this->deposit,
                'user' => $this->deposit->user,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
