<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_event_can_be_created()
    {
        $event = Event::factory()->create();

        $this->assertDatabaseHas('events', [
            'title' => $event->title
        ]);
    }

    /** @test */
    public function an_event_can_be_deleted()
    {
        $event = Event::factory()->create();

        $event->delete();

        $this->assertDatabaseMissing('events', [
            'title' => $event->title
        ]);
    }
}

