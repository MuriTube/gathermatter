@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="card-title">{{ $event->title }}</h1>
                        <hr class="my-4">
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
