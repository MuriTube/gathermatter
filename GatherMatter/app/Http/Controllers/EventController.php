<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $sortOption = $request->input('sort', 'date'); // Default sort option is 'date'

        if ($sortOption === 'title') {
            $events = Event::orderBy('title')->get();
        } else {
            $events = Event::orderBy('date')->get();
        }

        return view('events.index', ['events' => $events, 'sort' => $sortOption]);
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
            $imagePath = $request->file('image')->store('public/events');

            $event->image_path = str_replace('public/', '', $imagePath);

        }


        $event->save();

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    public function show(Event $event)
    {
        $event->load('organizer', 'tickets'); // Laden des Veranstalters
        $imagePath = $event->image_path; // Get the image path
        return view('events.show', ['event' => $event, 'imagePath' => $imagePath]);
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
            $oldImagePath = $event->image_path;
            $imagePath = $request->file('image')->store('images/events', 'public');
            if ($oldImagePath !== $imagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
            $event->image_path = $imagePath;
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
