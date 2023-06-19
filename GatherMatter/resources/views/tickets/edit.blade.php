@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Edit Ticket</h1>
                        <hr class="my-4">
                        <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       value="{{ $ticket->price }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tier" class="form-label">Tier</label>
                                <input type="text" class="form-control" id="tier" name="tier"
                                       value="{{ $ticket->tier }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          required>{{ $ticket->description }}</textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Ticket</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('events.show', $ticket->event) }}" class="btn btn-secondary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
