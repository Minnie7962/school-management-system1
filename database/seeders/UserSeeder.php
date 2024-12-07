<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => Str::uuid(),
            'username' => 'super_admin',
            'email' => 'super_admin@example.com',
            'password' => Hash::make('password'),
            'password_hash' => Hash::make('password'),
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'role' => 'super_admin',
            'email_verified_at' => now(),
            'is_active' => true
        ]);

        User::create([
            'id' => Str::uuid(),
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'password_hash' => Hash::make('password'),
            'first_name' => 'System',
            'last_name' => 'Admin',
            'role' => 'admin',
            'email_verified_at' => now(),
            'is_active' => true
        ]);
    }
}