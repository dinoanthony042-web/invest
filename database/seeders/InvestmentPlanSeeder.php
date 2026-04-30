<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvestmentPlan;

class InvestmentPlanSeeder extends Seeder
{
    public function run(): void
    {
        InvestmentPlan::create([
            'name' => 'Starter Plan',
            'description' => 'Perfect for beginners looking to start their investment journey',
            'price' => 500,
            'roi_percentage' => 8,
            'duration_months' => 6,
            'is_active' => true,
        ]);

        InvestmentPlan::create([
            'name' => 'Pro Plan',
            'description' => 'Ideal for experienced investors seeking higher returns',
            'price' => 2500,
            'roi_percentage' => 12,
            'duration_months' => 3,
            'is_active' => true,
        ]);

        InvestmentPlan::create([
            'name' => 'Elite Plan',
            'description' => 'Premium plan for sophisticated investors with large portfolios',
            'price' => 10000,
            'roi_percentage' => 15,
            'duration_months' => 1,
            'is_active' => true,
        ]);

        InvestmentPlan::create([
            'name' => 'Diamond Plan',
            'description' => 'Ultimate tier for elite investors seeking the highest rewards with dedicated premium service',
            'price' => 25000,
            'roi_percentage' => 20,
            'duration_months' => 12,
            'is_active' => true,
        ]);
    }
}
