<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([[
            'name' => 'Administrator',
            'email' => 'superadmin@vascomm.com',
            'password' => bcrypt('fajaragus123'),
            'role' => 'admin',
            'phone' => '08123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Customer',
            'email' => 'customer@vascomm.com',
            'password' => bcrypt('fajaragus123'),
            'phone' => '08123456789',
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
