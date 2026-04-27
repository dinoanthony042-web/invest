<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the database with an admin user.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@harbourcrest.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('admin123456'),
                'role' => 'admin',
                'wallet_balance' => 0,
                'email_verified_at' => now(),
            ]
        );
    }
}
