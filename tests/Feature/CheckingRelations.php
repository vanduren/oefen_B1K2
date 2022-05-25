<?php

namespace Tests\Feature;

use App\Models\Artikel;
use App\Models\Bestelling;
use App\Models\BestellingRegel;
use App\Models\Eenheid;
use App\Models\Klant;
use App\Models\Leverancier;
use App\Models\LeverancierArtikelRegel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckingRelations extends TestCase
{
    use RefreshDatabase;

    // check whether the user has a role
    public function test_user_has_role()
    {
        $role = Role::create([
            'role' => 'verkoper',
        ]);
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'jd@jd.com',
            'role_id' => $role->id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $this->assertEquals(User::first()->role->role, 'verkoper');
    }

    // check of klant bestelling heeft
    public function test_klant_has_bestelling()
    {
        $klant = Klant::create([
            'bedrijfsnaam' => 'svict',
            'contactpersoon' => 'dujo',
            'telefoonnummer' => '0612345678',
        ]);

        Bestelling::create([
            'klant_id' => $klant->id,
            'afgerond' => false,
        ]);

        $this->assertEquals(Klant::first()->bestellingen->first()->afgerond, false);
    }

    // check of bestelling regels heeft
    public function test_bestelling_has_regels()
    {
        $klant = Klant::create([
            'bedrijfsnaam' => 'svict',
            'contactpersoon' => 'dujo',
            'telefoonnummer' => '0612345678',
        ]);

        $bestelling = Bestelling::create([
            'klant_id' => $klant->id,
            'afgerond' => false,
        ]);

        $artikel = Artikel::create([
            'omschrijving' => 'test',
            'prijs' => '12',
        ]);

        $eenheid = Eenheid::create([
            'eenheid' => 'stuk',
        ]);

        BestellingRegel::create([
            'bestelling_id' => $bestelling->id,
            'artikel_id' => $artikel->id,
            'eenheid_id' => $eenheid->id,
            'aantal' => '3',
        ]);

        $this->assertEquals(Klant::first()->bestellingen->first()->bestellingregels->first()->aantal, 3);
    }

    // welke leverancier levert welk artikel
    public function test_artikel_has_leverancier()
    {
        $leverancier = Leverancier::create([
            'bedrijfsnaam' => 'svict',
            'contactpersoon' => 'dujo',
            'telefoonnummer' => '0612345678',
            'emailadres' => 'dujo@summacollege.nl'
        ]);

        $artikel = Artikel::create([
            'omschrijving' => 'test',
            'prijs' => '12',
        ]);

        LeverancierArtikelRegel::create([
            'leverancier_id' => $leverancier->id,
            'artikel_id' => $artikel->id,
            'prijs' => '30',
        ]);

        $this->assertEquals(Leverancier::first()->levert->first()->omschrijving, 'test');
    }


}
