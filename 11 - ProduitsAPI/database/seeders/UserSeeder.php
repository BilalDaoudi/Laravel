<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Création de 3 utilisateurs
        User::create([
            'name' => 'Utilisateur 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Utilisateur 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Utilisateur 3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
