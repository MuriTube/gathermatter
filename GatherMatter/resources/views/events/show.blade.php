@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $event->title }}</h1>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">Date: {{ $event->date }}</p>
            </div>
        </div>
    </div>
@endsection
