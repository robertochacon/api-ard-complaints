<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create test users with different roles
        $users = [
            [
                'identification' => '12345678',
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
            [
                'identification' => '87654321',
                'name' => 'Super Admin',
                'email' => 'superadmin@test.com',
                'password' => Hash::make('superadmin123'),
                'role' => 'super_admin',
            ],
            [
                'identification' => '11223344',
                'name' => 'Test User',
                'email' => 'user@test.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'identification' => '99887766',
                'name' => 'Demo User',
                'email' => 'demo@test.com',
                'password' => Hash::make('demo123'),
                'role' => 'user',
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}