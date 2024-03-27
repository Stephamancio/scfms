<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Create sample users with respective roles
        $users = [
            [
                'name' => 'Sarah May Candaleza',
                'email' => 'admin123@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Stephanie Amancio',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('manager123'),
                'role' => 'Manager',
            ],
            [
                'name' => 'Lea Bayno',
                'email' => 'cashier@gmail.com',
                'password' => bcrypt('cashier123'),
                'role' => 'Cashier',
            ],
            [
                'name' => 'Charles Abueva',
                'email' => 'parent@gmail.com',
                'password' => bcrypt('parent123'),
                'role' => 'Parent',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            // Assign role to user
            $role = Role::where('name', $userData['role'])->first();
            $user->role()->associate($role);
            $user->save();
        }
    }
}
