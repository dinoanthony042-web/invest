<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvestmentPlan;

class InvestmentPlanSeeder extends Seeder
{
    public function run(): void
    {
        InvestmentPlan::updateOrCreate([
            'name' => 'Starter Plan',
        ], [
            'description' => 'Perfect for beginners looking to start their investment journey',
            'price' => 500,
            'roi_percentage' => 20,
            'duration_months' => 1,
            'duration_days' => 7,
            'is_active' => true,
        ]);

        InvestmentPlan::updateOrCreate([
            'name' => 'Pro Plan',
        ], [
            'description' => 'Ideal for experienced investors seeking higher returns',
            'price' => 2500,
            'roi_percentage' => 90,
            'duration_months' => 1,
            'duration_days' => 30,
            'is_active' => true,
        ]);

        InvestmentPlan::updateOrCreate([
            'name' => 'Elite Plan',
        ], [
            'description' => 'Premium plan for sophisticated investors with large portfolios',
            'price' => 10000,
            'roi_percentage' => 250,
            'duration_months' => 6,
            'duration_days' => 180,
            'is_active' => true,
        ]);

        InvestmentPlan::updateOrCreate([
            'name' => 'Diamond Plan',
        ], [
            'description' => 'Ultimate tier for elite investors seeking the highest rewards with dedicated premium service',
            'price' => 25000,
            'roi_percentage' => 400,
            'duration_months' => 12,
            'duration_days' => 365,
            'is_active' => true,
        ]);
    }
}
