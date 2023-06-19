<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_User_kann_erstellt_werden()
    {
        $user = User::factory()->create();

        // Sicherstellen dass Testuser in der Datenbank erstellt wurde
        $this->assertDatabaseHas('users', [
            'email' => $user->email
        ]);
    }

    public function test_User_kann_geloescht_werden()
    {
        $user = User::factory()->create();

        $user->delete();

        // Sicherstellen dass Testuser nicht mehr in der Datenbank ist
        $this->assertDatabaseMissing('users', [
            'email' => $user->email
        ]);
    }
}

