<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/events', 'public');
            $event->image_path = str_replace('public/', '', $imagePath);
            
        }
        

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function show(Event $event)
    {
        $event->load('organizer', 'tickets');
        $imageUrl = Storage::url($event->image_path);
        return view('events.show', ['event' => $event, 'imageUrl' => $imageUrl]);
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
    
        if ($request->hasFile('image')) {
            // Wenn ein altes Bild existiert, löschen Sie es.
            if ($event->image_path) {
                Storage::disk('public')->delete('images/events/' . $event->image_path);
            }
            // Speichern Sie das neue Bild und aktualisieren Sie den image_path im Event.
            $imagePath = $request->file('image')->store('images/events', 'public');
            $event->image_path = str_replace('public/', '', $imagePath);
        }
    
        $event->save();
    
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $ticketCount = $event->tickets()->count();

        if ($ticketCount > 0) {
            return redirect()->route('events.show', $event)->with('error', 'Cannot delete the event. Please delete all tickets associated with this event first.');
        }

        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
