<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_User_mit_Adminrolle_kann_erstellt_werden()
    {
        // Erstelle einen Admin-Benutzer
        $admin = User::factory()->create(['role' => 'admin']);

        // Überprüfe, ob der Benutzer in der Datenbank existiert
        $this->assertDatabaseHas('users', [
            'email' => $admin->email,
        ]);

    }

    public function test_Admin_kann_sich_einloggen()
    {
        // Erstelle einen Admin-Benutzer
        $admin = User::factory()->create(['role' => 'admin']);

        // Versuche dich anzumelden
        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password'
        ]);

        // Stelle sicher, dass der Admin authentifiziert wurde
        $response->assertRedirect('/home');
    }

    public function test_Admin_kommt_ins_Adminpanel_rein()
    {
        // Erstelle einen Admin-Benutzer
        $admin = User::factory()->create(['role' => 'admin']);

        // Melde den Admin an
        $this->be($admin);

        // Versuche auf das Admin-Panel zuzugreifen
        $response = $this->get('/admin');

        // Stelle sicher, dass der Admin auf das Admin-Panel zugreifen kann
        $response->assertStatus(200);
    }
}
