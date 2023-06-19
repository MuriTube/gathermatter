<!-- resources/views/tickets/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="card-title">Create a new ticket</h1>
                            <hr class="my-4">
                        </div>
                        <form method="POST" action="{{ route('tickets.store', $event->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input id="price" type="number" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="tier" class="form-label">Tier:</label>
                                <input id="tier" class="form-control" name="tier" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="description" class="form-control" name="description" required></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Create Ticket</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
