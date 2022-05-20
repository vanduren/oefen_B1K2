<?php

namespace Tests\Feature;

use App\Models\Klant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
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
        $klanten = Klant::factory(10)->make();
        // make is create zonder save actie naar db
        $aantalKlanten = $klanten->count();
        $this->assertEquals(10, $aantalKlanten);
    }
    // run test
    // php artisan test tests/Feature/ExampleTest.php

}
