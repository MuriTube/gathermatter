@extends('layouts.app')

@section('content')
<div class="mt-5">  
<h1>Events</h1>
</div>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $event->image }}" class="card-img-top" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="{{ route('events.create', $event) }}" class="btn btn-secondary">Create</a>
    </div>
@endsection
