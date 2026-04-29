<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use App\Mail\VerifyEmailMail;

class VerifyEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Build the mail notification.
     */
    public function toMail(object $notifiable)
    {
        // Generate signed URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        /**
         * 🔥 FORCE PRODUCTION DOMAIN SAFETY FIX
         * This ensures Railway queue workers NEVER output localhost
         */
        $appUrl = config('app.url');

        if (!empty($appUrl)) {
            $parsedAppUrl = parse_url($appUrl);
            $host = $parsedAppUrl['host'] ?? null;

            if ($host) {
                $verificationUrl = preg_replace(
                    '/https?:\/\/[^\/]+/',
                    $parsedAppUrl['scheme'] . '://' . $host,
                    $verificationUrl
                );
            }
        }

        return (new VerifyEmailMail($notifiable, $verificationUrl))
            ->to($notifiable->email);
    }

    /**
     * Optional array representation
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}