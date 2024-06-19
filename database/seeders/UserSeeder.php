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
        ]);

        $manager->assignRole('manager');
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@graharupa.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
        ]);

        $admin->assignRole('admin');
        
        $employee = User::create([
            'name' => 'Employee',
            'email' => 'employee@graharupa.com',
            'password' => Hash::make('password'),
        ]);

        $employee->assignRole('employee');
    }
}
