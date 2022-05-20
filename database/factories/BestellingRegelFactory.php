<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\Bestelling;
use App\Models\Eenheid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BestellingRegel>
 */
class BestellingRegelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bestelling_id' => Bestelling::inRandomOrder()->first()->id,
            'artikel_id' => Artikel::inRandomOrder()->first()->id,
            'eenheid_id' => Eenheid::inRandomOrder()->first()->id,
            'aantal' => $this->faker->randomNumber(2),
        ];
    }
}
