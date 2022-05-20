<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Bestelling;
use App\Models\BestellingRegel;
use App\Models\Eenheid;
use App\Models\Klant;
use App\Models\Leverancier;
use App\Models\LeverancierArtikelRegel;
use App\Models\Role;
use App\Models\User;
use App\Models\VoorraadRegel;
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
        Role::factory(3)->create();
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => 2,
        ]);

        Klant::factory()->create([
            'bedrijfsnaam' => 'Test Bedrijf',
            'contactpersoon' => 'Test Persoon',
            'telefoonnummer' => '0612345678',
        ]);

        Klant::factory(10)->create();
        Leverancier::factory(10)->create();
        Eenheid::factory(6)->create();
        Artikel::factory(100)->create();
        LeverancierArtikelRegel::factory(300)->create();
        Bestelling::factory(100)->create();
        BestellingRegel::factory(300)->create();
        VoorraadRegel::factory(200)->create();
    }
}
