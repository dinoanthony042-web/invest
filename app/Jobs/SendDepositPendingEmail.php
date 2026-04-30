<?php

namespace App\Jobs;

use App\Models\DepositRequest;
use App\Services\BrevoEmailService;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class SendDepositPendingEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public DepositRequest $deposit
    ) {}

    /**
     * Execute the job.
     *
     * @throws \Exception
     */
    public function handle(BrevoEmailService $brevoService): void
    {
        // Validate deposit and user existence
        if (!$this->deposit || !$this->deposit->exists) {
            Log::error('Deposit not found for pending email job', [
                'deposit_id' => $this->deposit?->id,
            ]);
            throw new \InvalidArgumentException('Deposit no longer exists.');
        }

        if (!$this->deposit->user) {
            Log::error('User not found for deposit pending email', [
                'deposit_id' => $this->deposit->id,
            ]);
            throw new \InvalidArgumentException('User associated with deposit no longer exists.');
        }

        if (empty($this->deposit->user->email)) {
            Log::error('User email missing for deposit pending email', [
                'deposit_id' => $this->deposit->id,
                'user_id' => $this->deposit->user->id,
            ]);
            throw new \InvalidArgumentException('User email address is missing.');
        }

        try {
            // Render email template
            $htmlContent = View::make('emails.deposit-pending', [
                'deposit' => $this->deposit,
                'user' => $this->deposit->user,
            ])->render();

            // Send via Brevo
            $brevoService->send(
                \App\Notifications\Messages\BrevoMessage::create(
                    'Deposit Request Submitted - Bridgefield Capital Group',
                    $htmlContent
                )
                ->to($this->deposit->user->email, $this->deposit->user->name)
                ->tag('deposit-pending')
            );

            Log::info('Deposit pending email sent successfully', [
                'deposit_id' => $this->deposit->id,
                'user_id' => $this->deposit->user->id,
                'recipient' => $this->deposit->user->email,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send deposit pending email', [
                'deposit_id' => $this->deposit->id,
                'user_id' => $this->deposit->user->id,
                'recipient' => $this->deposit->user->email ?? 'N/A',
                'error' => $e->getMessage(),
                'exception' => get_class($e),
            ]);

            throw $e;
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::critical('Deposit pending email job failed permanently', [
            'deposit_id' => $this->deposit->id,
            'user_id' => $this->deposit->user?->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
