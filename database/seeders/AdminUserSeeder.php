<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'buildwebpro@gmail.com',
            'password' => Hash::make('m.3312050'),
            'email_verified_at' => now(),
        ]);
    }
}