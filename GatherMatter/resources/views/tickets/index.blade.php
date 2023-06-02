<!-- resources/views/tickets/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tickets</h1>
    <div class="row">
        @foreach($tickets as $ticket)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-lg h-100">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">{{ $ticket->description }}</h5>
                    <h6 class="text-muted text-center">Event: {{ $ticket->event->title }}</h6>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Price: <span class="font-weight-bold">{{ $ticket->price }}</span></p>
                        <p class="mb-0">Tier: <span class="font-weight-bold">{{ $ticket->tier }}</span></p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-primary mt-3">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
