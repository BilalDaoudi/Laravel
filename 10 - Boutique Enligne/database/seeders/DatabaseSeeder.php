<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(LigneCommandeSeeder::class);

        $this->call(CategorieSeeder::class);
        $this->call(ProduitSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin Admin',
        //     'email' => 'Admin@admin.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        // ]);
    }
}
