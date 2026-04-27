<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::where('email', 'test@example.com')->first();
        $btc = \App\Models\CryptoCurrency::where('symbol', 'BTC')->first();
        $eth = \App\Models\CryptoCurrency::where('symbol', 'ETH')->first();

        \App\Models\Investment::create([
            'user_id' => $user->id,
            'crypto_currency_id' => $btc->id,
            'amount' => 0.5,
            'purchase_price' => 60000.00,
            'purchase_date' => now()->subDays(30),
        ]);

        \App\Models\Investment::create([
            'user_id' => $user->id,
            'crypto_currency_id' => $eth->id,
            'amount' => 2.0,
            'purchase_price' => 3000.00,
            'purchase_date' => now()->subDays(15),
        ]);
    }
}
