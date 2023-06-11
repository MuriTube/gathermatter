<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_login()
    {
        // Create an admin user
        $admin = User::factory()->create(['role' => 'admin']);

        // Attempt to login
        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password'
        ]);

        // Assert the admin was authenticated
        $response->assertRedirect('/home');
    }
}
