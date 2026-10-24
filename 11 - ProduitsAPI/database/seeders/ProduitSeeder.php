<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
use App\Models\User;

class ProduitSeeder extends Seeder
{
    public function run()
    {
        // Récupérer tous les utilisateurs
        $users = User::all();

        // Pour chaque utilisateur, créer 5 produits
        foreach ($users as $user) {
            Produit::create([
                'user_id' => $user->id,
                'nom' => 'Produit 1 de ' . $user->name,
                'description' => 'Description du produit 1',
                'prix' => 100.00,
            ]);

            Produit::create([
                'user_id' => $user->id,
                'nom' => 'Produit 2 de ' . $user->name,
                'description' => 'Description du produit 2',
                'prix' => 150.00,
            ]);

            Produit::create([
                'user_id' => $user->id,
                'nom' => 'Produit 3 de ' . $user->name,
                'description' => 'Description du produit 3',
                'prix' => 200.00,
            ]);

            Produit::create([
                'user_id' => $user->id,
                'nom' => 'Produit 4 de ' . $user->name,
                'description' => 'Description du produit 4',
                'prix' => 250.00,
            ]);

            Produit::create([
                'user_id' => $user->id,
                'nom' => 'Produit 5 de ' . $user->name,
                'description' => 'Description du produit 5',
                'prix' => 300.00,
            ]);
        }
    }
}

