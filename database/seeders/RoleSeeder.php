<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // สร้าง roles ถ้ายังไม่มี
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }
        
        if (!Role::where('name', 'shop_manager')->exists()) {
            Role::create(['name' => 'shop_manager']);
        }
        
        if (!Role::where('name', 'customer')->exists()) {
            Role::create(['name' => 'customer']);
        }
        
        // assign role ให้กับ admin user
        $admin = User::where('email', 'admin@example.com')->first();
        if ($admin && !$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        // assign role customer ให้กับ users ที่ยังไม่มี role
        $users = User::whereDoesntHave('roles')->get();
        foreach ($users as $user) {
            $user->assignRole('customer');
        }
    }
}