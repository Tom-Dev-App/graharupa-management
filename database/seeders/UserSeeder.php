<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@graharupa.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'role_id' => 1
        ]);

        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@graharupa.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'role_id' => 2
        ]);

        
        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@graharupa.com',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]);

    }
}
