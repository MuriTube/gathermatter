<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_Event_kann_erstellt_werden()
    {
        $event = Event::factory()->create();

        // Stellt sicher dass das Testevent in der Datenbank vorhanden ist
        $this->assertDatabaseHas('events', [
            'title' => $event->title
        ]);
    }

    public function test_Event_kann_geloescht_werden()
    {
        $event = Event::factory()->create();

        $event->delete();

        // Stellt sicher dass das Testevent nicht mehr in der Datenbank ist
        $this->assertDatabaseMissing('events', [
            'title' => $event->title
        ]);
    }
}

