<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i < 4; $i++) {
            DB::table('produits')->insert([
           
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'image' => $i.".png",
                'price' => $faker->randomFloat(2, 10, 100),
                'quantite' => $faker->numberBetween(1, 10),
                'categorie_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
