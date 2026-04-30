<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\DepositRequest;
use App\Services\BrevoEmailService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class DepositPendingMail implements ShouldQueue
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
     * Execute the job.
     */
    public function handle(BrevoEmailService $brevoService): void
    {
        try {
            $htmlContent = View::make('emails.deposit-pending', [
                'deposit' => $this->deposit,
                'user' => $this->deposit->user,
            ])->render();

            $brevoService->send(
                \App\Notifications\Messages\BrevoMessage::create(
                    'Deposit Request Submitted - Bridgefield Capital Group',
                    $htmlContent
                )
                ->to($this->deposit->user->email, $this->deposit->user->name)
                ->tag('deposit-pending')
            );
        } catch (\Exception $e) {
            Log::error('Failed to send deposit pending email', [
                'deposit_id' => $this->deposit->id,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
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
