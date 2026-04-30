<?php

namespace App\Jobs;

use App\Models\DepositRequest;
use App\Services\BrevoEmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class SendDepositApprovedEmail implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public DepositRequest $deposit) {}

    public function handle(BrevoEmailService $brevo)
    {
        try {
            $html = View::make('emails.deposit-approved', [
                'deposit' => $this->deposit,
                'user' => $this->deposit->user,
            ])->render();

            $brevo->send(
                \App\Notifications\Messages\BrevoMessage::create(
                    'Deposit Approved - Bridgefield Capital Group',
                    $html
                )
                ->to($this->deposit->user->email, $this->deposit->user->name)
                ->tag('deposit-approved')
            );

        } catch (\Exception $e) {
            Log::error('Deposit approved email failed', [
                'deposit_id' => $this->deposit->id,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}