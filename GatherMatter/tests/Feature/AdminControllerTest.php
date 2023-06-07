<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
      $admin =  User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertViewHas('users');
        // Hier kannst du weitere Assertions hinzufügen, um sicherzustellen, dass die Benutzerdaten in der Ansicht korrekt angezeigt werden
    }
    
    
   
}
