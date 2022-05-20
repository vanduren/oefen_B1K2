<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eenheid>
 */
class EenheidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $eenheid = ['gram', 'liter', 'stuk', 'pak', 'kilo', 'stuks'];
        return [
            'eenheid' => $this->faker->unique()->randomElement($eenheid),
        ];
    }
}
