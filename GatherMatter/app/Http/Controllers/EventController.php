<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->organizerID = Auth::user()->id; // Speichern der Organizer-ID
        $event->save();
        

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function show(Event $event)
    {   
        $event->load('organizer', 'tickets'); // Laden des Veranstalters
        return view('events.show', ['event' => $event]);
    }

    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->organizerID = Auth::user()->id;
        $event->save();
        

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $ticketCount = $event->tickets()->count();
    
        if ($ticketCount > 0) {
            return redirect()->route('events.show', $event)->with('error', 'Cannot delete the event. Please delete all tickets associated with this event first.');
        }
    
        $event->delete();
    
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
    
}
