<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\Eenheid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VoorraadRegel>
 */
class VoorraadRegelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'artikel_id' => Artikel::inRandomOrder()->first()->id,
            'eenheid_id' => Eenheid::inRandomOrder()->first()->id,
            'aantal' => $this->faker->randomNumber(2),
            'locatie' => $this->faker->word,
        ];
    }
}
