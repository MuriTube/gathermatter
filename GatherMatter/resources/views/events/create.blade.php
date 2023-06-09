@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create Event</h1>
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="organizerID" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="datetime-local" name="date" class="form-control">
                @if ($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="mb-3">
                <label for="maxParticipants" class="form-label">Max Participants:</label>
                <input type="number" name="maxParticipants" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Event-Image:</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                <img id="preview" src="#" alt="Event Image Preview" style="width: 150px; display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
@endsection
