<?php

namespace App\Notifications\Channels;

use App\Notifications\Messages\BrevoMessage;
use App\Services\BrevoEmailService;
use Illuminate\Notifications\Notification;

class BrevoChannel
{
    public function send($notifiable, Notification $notification): void
    {
        if (! method_exists($notification, 'toBrevo')) {
            return;
        }

        $message = $notification->toBrevo($notifiable);

        if (! $message instanceof BrevoMessage) {
            return;
        }

        if (empty($message->to)) {
            return;
        }

        app(BrevoEmailService::class)->send($message);
    }
}
