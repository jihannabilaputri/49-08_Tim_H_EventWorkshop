<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder hanya jalan di lokal / testing
        if (! app()->environment(['local', 'testing'])) {
            return;
        }

        User::updateOrCreate(
            ['email' => env('SEED_ADMIN_EMAIL', 'admin@event.test')],
            [
                'name' => env('SEED_ADMIN_NAME', 'Admin'),
                'password' => env('SEED_ADMIN_PASSWORD', 'admin12345'),
                'role' => User::ROLE_ADMIN,
            ]
        );

        User::updateOrCreate(
            ['email' => env('SEED_USER_EMAIL', 'user@event.test')],
            [
                'name' => env('SEED_USER_NAME', 'User Biasa'),
                'password' => env('SEED_USER_PASSWORD', 'user12345'),
                'role' => User::ROLE_USER,
            ]
        );
    }
}