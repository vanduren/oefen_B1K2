<?php

namespace Database\Seeders;

use App\Models\Klant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Klant::factory()->create([
            'bedrijfsnaam' => 'Test Bedrijf',
            'contactpersoon' => 'Test Persoon',
            'telefoonnummer' => '0612345678',
        ]);

        Klant::factory(10)->create();
    }
}
