<?php

namespace App\Notifications;

use App\Notifications\Channels\BrevoChannel;
use App\Notifications\Messages\BrevoMessage;
use App\Services\BrevoEmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class DepositApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $deposit;

    public function __construct($deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return [BrevoChannel::class];
    }

    /**
     * Build the Brevo email payload.
     */
    public function toBrevo(object $notifiable): BrevoMessage
    {
        $html = app(BrevoEmailService::class)->renderHtml('emails.deposit-approved', [
            'deposit' => $this->deposit,
            'user' => $notifiable,
        ]);

        return BrevoMessage::create('Deposit Approved - Bridgefield Capital Group', $html)
            ->to($notifiable->email, $notifiable->name ?? '')
            ->tag('deposit-approved');
    }

    /**
     * Optional array representation
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}
