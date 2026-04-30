<?php

namespace App\Services;

use App\Notifications\Messages\BrevoMessage;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class BrevoEmailService
{
    protected string $apiKey;
    protected string $senderEmail;
    protected string $senderName;

    public function __construct()
    {
        $this->apiKey = config('services.brevo.key');
        $this->senderEmail = config('services.brevo.sender_email');
        $this->senderName = config('services.brevo.sender_name');
    }

    public function send(BrevoMessage $message): void
    {
        if (empty($this->apiKey)) {
            throw new \RuntimeException('Brevo API key is not configured. Set BREVO_API_KEY in your environment.');
        }

        $payload = [
            'sender' => [
                'name' => $message->senderName ?? $this->senderName,
                'email' => $message->senderEmail ?? $this->senderEmail,
            ],
            'to' => $message->to,
            'subject' => $message->subject,
            'htmlContent' => $message->html,
            'textContent' => $message->text ?? $this->renderText($message->html),
        ];

        if ($message->replyTo) {
            $payload['replyTo'] = $message->replyTo;
        }

        if ($message->tag) {
            $payload['tags'] = [$message->tag];
        }

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'api-key' => $this->apiKey,
            ])
            ->timeout(15)
            ->post('https://api.brevo.com/v3/smtp/email', $payload);

            $response->throw();
        } catch (RequestException $exception) {
            Log::error('Brevo email send failed', [
                'message' => $exception->getMessage(),
                'payload' => $payload,
                'response' => $exception->response?->body(),
            ]);

            throw $exception;
        }
    }

    public function renderHtml(string $view, array $data = []): string
    {
        return View::make($view, $data)->render();
    }

    protected function renderText(string $html): string
    {
        $text = strip_tags($html);
        return html_entity_decode(preg_replace('/\s+/', ' ', $text));
    }
}
