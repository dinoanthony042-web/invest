<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptoCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CryptoCurrency::create([
            'symbol' => 'BTC',
            'name' => 'Bitcoin',
            'current_price' => 65000.00,
            'market_cap' => 1200000000000.00,
            'price_change_24h' => 2.5,
        ]);

        \App\Models\CryptoCurrency::create([
            'symbol' => 'ETH',
            'name' => 'Ethereum',
            'current_price' => 3200.00,
            'market_cap' => 380000000000.00,
            'price_change_24h' => -1.2,
        ]);

        \App\Models\CryptoCurrency::create([
            'symbol' => 'ADA',
            'name' => 'Cardano',
            'current_price' => 0.45,
            'market_cap' => 16000000000.00,
            'price_change_24h' => 0.8,
        ]);

        \App\Models\CryptoCurrency::create([
            'symbol' => 'SOL',
            'name' => 'Solana',
            'current_price' => 145.00,
            'market_cap' => 65000000000.00,
            'price_change_24h' => 3.1,
        ]);
    }
}
