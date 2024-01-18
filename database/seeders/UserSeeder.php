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
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Customer',
            'email' => 'customer@vascomm.com',
            'password' => bcrypt('fajaragus123'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
