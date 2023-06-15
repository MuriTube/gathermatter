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
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> {{ date('jS F Y H:i', strtotime($event->date)) }}</p>
                            @if(!empty($event->location))
                                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> Location: {{ $event->location }}</p>
                                    @endif
                                    @if(!empty($event->maxParticipants))
                                        <p class="card-text"><i class="fas fa-users"></i> Max Participants: {{ $event->maxParticipants }}</p>
                                    @endif
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
                                                <p>Price: €{{ $ticket->price }}</p>
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
                                            @if(Auth::user())
                                                <form action="{{ route('cart.add', $ticket) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="number" name="quantity" value="1" min="1" max="10" class="form-control d-inline" style="width: 70px;">
                                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
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

