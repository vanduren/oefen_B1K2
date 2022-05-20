<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Klant>
 */
class KlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bedrijfsnaam' => $this->faker->company,
            'contactpersoon' => $this->faker->name,
            'telefoonnummer' => $this->faker->phoneNumber,
        ];
    }
}
