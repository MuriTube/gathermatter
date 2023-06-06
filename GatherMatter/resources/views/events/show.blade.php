@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success mt-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="card-title">{{ $event->title }}</h1>
                        @if($imagePath)
                            <img src="{{ asset('storage/' . $imagePath) }}" alt="Event Image" class="img-fluid">
                        @endif
                        <hr class="my-4">
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                        <!-- Here is the new button -->
                        @if(Auth::user() && (Auth::user()->role === 'admin' || (Auth::user()->role === 'organizer' && $event->organizerID === Auth::user()->id)))
                            <a href="{{ route('tickets.create', $event->id) }}" class="btn btn-primary mt-3">Create Ticket</a>
                        @endif
                    </div>
                </div>
            </div>
            @if($event->tickets && count($event->tickets) > 0)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Tickets</h5>
                        <ul class="list-group">
                            @foreach($event->tickets as $ticket)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Tier: {{ $ticket->tier }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Price: {{ $ticket->price }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Description: {{ $ticket->description }}</p>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        @if(Auth::user() && (Auth::user()->role === 'admin' || (Auth::user()->role === 'organizer' && $ticket->event->organizerID === Auth::user()->id)))
                                            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
