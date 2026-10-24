<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // "CIN" => "SB".fake()->numberBetween(1000,9999),
            
            "CIN" => "SB".fake()->unique()->randomNumber(5),
            "Nom" => fake()->lastName(),
            "Prenom" => fake()->firstName(),
            "DateNaissance" => fake()->date(),
            "Nationalite" => fake()->country(),
            "Telephone" => fake()->e164PhoneNumber(),
            "Permis" => Str::random(6),
        ];
    }
}
