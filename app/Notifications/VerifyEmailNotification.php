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
    $appUrl = rtrim(config('app.url'), '/');

    $verificationUrl = $appUrl . '/email/verify/' . $notifiable->getKey() . '/' . sha1($notifiable->getEmailForVerification());

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