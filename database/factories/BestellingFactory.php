<?php

namespace Database\Factories;

use App\Models\Klant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bestelling>
 */
class BestellingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'klant_id' => Klant::inRandomOrder()->first()->id,
            'afgerond' => $this->faker->boolean,
        ];
    }
}
