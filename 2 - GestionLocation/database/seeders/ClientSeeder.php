<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Client::factory(100)->create();
        // \App\Models\Client::factory()->create([
        //     "CIN" => "SB125487",
        //     "Nom" => "Daoudi",
        //     "Prenom" => "Bilal",
        //     "DateNaissance" => "2002-09-12",
        //     "Nationalite" => "Maroc",
        //     "Telephone" => "0707900867",
        //     "Permis" => "145878",
        //     ]);
    }
}
