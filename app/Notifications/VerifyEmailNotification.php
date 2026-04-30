<?php

namespace App\Notifications;

use App\Notifications\Channels\BrevoChannel;
use App\Notifications\Messages\BrevoMessage;
use App\Services\BrevoEmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

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
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        $html = app(BrevoEmailService::class)->renderHtml('emails.verify-email', [
            'user' => $notifiable,
            'verificationUrl' => $verificationUrl,
        ]);

        return BrevoMessage::create('Verify Your Email - Bridgefield Capital Group', $html)
            ->to($notifiable->email, $notifiable->name ?? '')
            ->tag('email-verification');
    }

    /**
     * Optional array representation
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}