<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              // Create users
              $manager = User::create([
                'name' => 'Manager',
                'email' => 'manager@graharupa.com',
                'password' => Hash::make('password'),
            ]);
    
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@graharupa.com',
                'password' => Hash::make('password'),
            ]);
    
            $employee = User::create([
                'name' => 'Employee',
                'email' => 'employee@graharupa.com',
                'password' => Hash::make('password'),
            ]);
    
            $manager->assignRole('MANAGER');
            $admin->assignRole('ADMIN');
            $employee->assignRole('EMPLOYEE');
    }
}
