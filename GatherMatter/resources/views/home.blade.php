@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>{{ __('Welcome, ') }}{{ Auth::user()->name }}!</h2>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->isAdmin())
                            <p class="lead text-center">
                                {{ __('You are logged in as an administrator!') }}
                            </p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.index') }}" class="btn btn-primary">Go to Admin Panel</a>
                            </div>
                        @elseif (Auth::user()->role === 'organizer')
                            <p class="lead text-center">
                                {{ __('You are logged in as an organizer!') }}
                            </p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('events.index') }}" class="btn btn-primary">Go to My Events</a>
                            </div>
                        @else
                            <p class="lead text-center">
                                {{ __('You are logged in! Now you can explore our platform.') }}
                            </p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('events.index') }}" class="btn btn-primary">Explore Events</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
