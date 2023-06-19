@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $event->title }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control">{{ $event->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="datetime-local" name="date" class="form-control" value="{{ $event->date }}">
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" name="location" class="form-control" value="{{ $event->location }}">
            </div>
            <div class="mb-3">
                <label for="maxParticipants" class="form-label">Max Participants:</label>
                <input type="number" name="maxParticipants" class="form-control" value="{{ $event->maxParticipants }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Current Event-Image:</label><br>
                <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" width="200"><br>
                <label for="image">New Event-Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
@endsection
