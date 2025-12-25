<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@rentify.com'],
            [
                'name' => 'Admin Rentify',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
