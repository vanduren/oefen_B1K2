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
use App\Models\VoorraadRegel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // dit zorgt voor een fresh migration na elke test (in de in memory test db)
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function test_the_application_returns_a_successful_response_with_a_view()
    // {
    //     $response = $this->get('/');

    //     $response->assertViewIs('welcome');
    // }


    // als je factory gebruikt (of andere elementen van laravel) dan moet
    // je "use Tests\TestCase;" gebruiken (standaard in Feature test)
    // In Unit test heb je een andere verwijzing waardoor je deze niet moet gebruiken
    // enkel php functies testen in unit test (of de use toevoegen/veranderen)

    /**
     * A test to get all customers.
     *
     * @return void
     */
    public function test_that_gets_customers()
    {
        $klanten = Klant::factory(10)->create();
        // make is create zonder save actie naar db
        $aantalKlanten = $klanten->count();
        $this->assertEquals(10, $aantalKlanten);
    }
    // run test
    // php artisan test tests/Feature/ExampleTest.php

    /**
     * A test to get all suppliers.
     *
     * @return void
     */
    public function test_that_gets_suppliers()
    {
        $leveranciers = Leverancier::factory(10)->create();
        $aantalLeveranciers = $leveranciers->count();
        $this->assertEquals(10, $aantalLeveranciers);
    }


    /**
     * A test to get all measure (of units) (eenheid).
     * deze test is voor de eenheid (varchar) met extra id (opzoektabel)
     * @return void
     */
    public function test_that_gets_measure_units()
    {
        $eenheden = Eenheid::factory(5)->create();
        $aantalEenheden = $eenheden->count();
        $this->assertEquals(5, $aantalEenheden);
    }

        /**
     * A test to get all articles.
     *
     * @return void
     */
    public function test_that_gets_articles()
    {
        $artikelen = Artikel::factory(10)->create();
        $aantalArtikelen = $artikelen->count();
        $this->assertEquals(10, $aantalArtikelen);
    }

    /**
     * A test to get all supplier_article_lines.
     *
     * @return void
     */
    public function test_that_gets_supplier_article_lines()
    {
        Leverancier::factory(10)->create();
        Artikel::factory(10)->create();
        $leverancierArtikelRegels = LeverancierArtikelRegel::factory(10)->create();
        $aantalLeverancierArtikelRegels = $leverancierArtikelRegels->count();
        $this->assertEquals(10, $aantalLeverancierArtikelRegels);
    }


    /**
     * A test to get all orders.
     *
     * @return void
     */
    public function test_that_gets_orders()
    {
        Klant::factory(10)->create();
        $bestellingen = Bestelling::factory(10)->create();
        $aantalBestellingen = $bestellingen->count();
        $this->assertEquals(10, $aantalBestellingen);
    }

    /**
     * A test to get all orderlines.
     *
     * @return void
     */
    public function test_that_gets_orderlines()
    {
        // en klant (omdat je ook bestellingen wilt maken)
        Klant::factory(10)->create();
        Bestelling::factory(10)->create();
        Artikel::factory(10)->create();
        Eenheid::factory(5)->create();
        $bestellingRegels = BestellingRegel::factory(10)->create();
        $aantalBestellingRegels = $bestellingRegels->count();
        $this->assertEquals(10, $aantalBestellingRegels);
    }

    /**
     * A test to get all supplylines.
     *
     * @return void
     */
    public function test_that_gets_supplylines()
    {
        Artikel::factory(10)->create();
        Eenheid::factory(5)->create();
        $voorraadRegels = VoorraadRegel::factory(10)->create();
        $aantalVoorraadRegels = $voorraadRegels->count();
        $this->assertEquals(10, $aantalVoorraadRegels);
    }

    /**
     * A test to get all roles.
     *
     * @return void
     */
    public function test_that_gets_roles()
    {

        $rollen = Role::factory(3)->create();
        $aantalRollen = $rollen->count();
        $this->assertEquals(3, $aantalRollen);
    }

    /**
     * A test to get all users.
     *
     * @return void
     */
    public function test_that_gets_users()
    {
        Role::factory(3)->create();
        $users = User::factory(10)->create();
        $aantalUsers = $users->count();
        $this->assertEquals(10, $aantalUsers);
    }
}
