@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->role === 'organizer')
                <div class="text-center mb-5">
                    <h1>My Events</h1>
                </div>
            @elseif(Auth::user()->role === 'admin')
                <div class="text-center mb-5">
                    <h1>All Events</h1>
                </div>
            @endif
            <div class="row">
                @foreach($events as $event)
                    @if((Auth::user()->role === 'organizer' && $event->organizerID === Auth::user()->id) || Auth::user()->role === 'admin')
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 shadow">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Event Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    @if(Auth::user()->role === 'admin' && $event->organizer)
                                    <h5 class="card-subtitle mb-2 text-muted">Organized by: {{ $event->organizer->name }}</h5>
                                    @endif

                                    <b>Beginn: <p class="card-text">{{ $event->date }}</p></b>
                                </div>
                                <div class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center bg-white">
                                    <a href="{{ route('events.show', $event) }}" class="btn btn-primary mb-2 mb-md-0">View Details</a>
                                    @if(Auth::user()->role === 'admin' || (Auth::user()->role === 'organizer' && $event->organizerID === Auth::user()->id))
                                        <div class="btn-group">
                                            <a href="{{ route('events.edit', $event) }}" class="btn btn-secondary ml-md-2">Edit</a>
                                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-md-2">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'organizer')
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ route('events.create') }}" class="btn btn-secondary">Create New Event</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
