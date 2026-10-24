<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([ClientSeeder::class]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Daoudi',
        //     'email' => 'Daoudi@example.com',
        //     'password' => '$2y$10$z9RXmS2Y8A5OIDWw870lkOL4bsr4ipGsI7tCeSPCleloniuXVcMWS',
        // ]);
    }
}
