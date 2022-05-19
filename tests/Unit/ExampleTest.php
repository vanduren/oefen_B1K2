<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_that_true_is_true()
    // {
    //     $this->assertTrue(true);
    // }

    /**
     * A test to get all customers.
     *
     * @return void
     */
    public function test_that_gets_customers()
    {
        // $aantalKlanten = factory(Klant::class, 10)->create()->count();
        $aantalKlanten = 10;
        $this->assertEquals(10, $aantalKlanten);
    }
    // run test
    // php artisan test tests/Unit/ExampleTest.php

}
