<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Event $event
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Event $event)
    {
        return view('tickets.create', ['event' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'tier' => 'required',
            'description' => 'required',
        ]);

        $ticket = new Ticket($validatedData);
        $ticket->event()->associate($event);
        $ticket->save();

        return redirect()->route('events.show', [$event])->with('success', 'Ticket is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'tier' => 'required',
            'description' => 'required',
        ]);
        $event = $ticket->event;
        $ticket->fill($validatedData);
        $ticket->save();

        return redirect()->route('events.show', $event)->with('success', 'Ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ticket $ticket)
    {
        $event = $ticket->event;
        // Speichern des Event-Objekts, bevor das Ticket gelöscht wird
        $ticket->delete();
        return redirect()->route('events.show', $event)->with('success', 'Ticket deleted successfully');
    }

}
