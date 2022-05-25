<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckingUsersRoles extends TestCase
{
    use RefreshDatabase;
    /**
     * test whether user can loggin.
     *
     * @return void
     */
    public function test_is_logged_in()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'jd@jd.com',
            'password' => bcrypt($password = 'testWachtwoord123'),
            'role_id' => null,
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertRedirect('/dashboard');
        // $this->assertAuthenticatedAs($user);
    }
}
