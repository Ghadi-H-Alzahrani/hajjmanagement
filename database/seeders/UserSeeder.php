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
    public function run()
    {
        User::create([
            'name' => 'Kareem',
            'email' => 'kareem@example.com',
            'password' => bcrypt('password'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Haitham',
            'email' => 'haitham@example.com',
            'password' => bcrypt('password'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Abdullah',
            'email' => 'abdullah@example.com',
            'password' => bcrypt('password'),
            'role' => 'manager'
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
    }
}
