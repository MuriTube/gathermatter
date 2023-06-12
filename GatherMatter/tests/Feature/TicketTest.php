<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\Ticket;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_Ticket_kann_erstellt_werden()
    {
        $ticket = Ticket::factory()->create();

        // Stellt sicher dass das Testticket in der Datenbank vorhanden ist
        $this->assertDatabaseHas('tickets', [
            'price' => $ticket->price,
            'tier' => $ticket->tier,
            'description' => $ticket->description
        ]);
    }

    public function test_Ticket_kann_geloescht_werden()
    {
        $ticket = Ticket::factory()->create();

        $ticket->delete();

        // Stellt sicher dass das Testticket nicht mehr in der Datenbank ist
        $this->assertDatabaseMissing('tickets', [
            'price' => $ticket->price,
            'tier' => $ticket->tier,
            'description' => $ticket->description
        ]);
    }
    
    public function test_Ticket_kann_bearbeitet_werden()
    {
        $ticket = Ticket::factory()->create();

        $ticket->update([
            'price' => '100',
            'tier' => 'VIP',
            'description' => 'VIP ticket'
        ]);

        // Stellt sicher dass das Testticket aktualisiert wurde in der Datenbank
        $this->assertDatabaseHas('tickets', [
            'price' => '100',
            'tier' => 'VIP',
            'description' => 'VIP ticket'
        ]);
    }
}
