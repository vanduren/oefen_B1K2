<?php

namespace Database\Factories;

use App\Models\Artikel;
use App\Models\Leverancier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeverancierArtikelRegel>
 */
class LeverancierArtikelRegelFactory extends Factory
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
            'leverancier_id' => Leverancier::inRandomOrder()->first()->id,
            'prijs' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
