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

        
        $agus = User::create([
            'name' => 'Agus',
            'email' => 'agus@graharupa.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'role_id' => 1
        ]);

        $dita = User::create([
            'name' => 'Dita',
            'email' => 'dita@graharupa.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'role_id' => 1
        ]);

        
        $fery = User::create([
            'name' => 'Fery',
            'email' => 'fery@graharupa.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);

        
        $dicky = User::create([
            'name' => 'Dicky',
            'email' => 'dicky@graharupa.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);

        $vito = User::create([
            'name' => 'Vito',
            'email' => 'vito@graharupa.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);

        $inul = User::create([
            'name' => 'Inul',
            'email' => 'inul@graharupa.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);

        
    }
}
