@extends('layouts.app')
@section('content')
<div class="container-fluid py-5">
   @if (session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
   </div>
   @endif
   <div class="row justify-content-center">
      <div class="col-md-10">
         @if(Auth::user() && Auth::user()->role === 'organizer')
         <div class="text-center mb-4">
            <h3>Your Events</h3>
            <a href="{{ route('events.create') }}" class="btn btn-secondary">Create New Event</a>
         </div>
         <div class="row">
            @foreach($events as $event)
            @if($event->organizerID === Auth::user()->id)
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card h-100 shadow">
                  <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top" alt="Event Image">
                  <div class="card-body">
                     <h5 class="card-title">{{ $event->title }}</h5>
                     <h5 class="card-subtitle mb-2 text-muted">Organized by: {{ $event->organizer->name }}</h5>
                     <b>
                        Beginn: 
                        <p class="card-text">{{ $event->date }}</p>
                     </b>
                  </div>
                  <div class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center bg-white">
                     <a href="{{ route('events.show', $event) }}" class="btn btn-primary mb-2 mb-md-0">View Details</a>
                     @if(Auth::user()->role === 'organizer')
                     <div class="btn-group">
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-secondary ml-md-2">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete the event: {{ $event->title }}?');">
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
         <hr class="my-5">
         @endif
         <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="dropdown">
               <form action="{{ route('events.index') }}" method="GET" class="d-inline">
                  <select name="sort" onchange="this.form.submit()" class="form-select">
                  <option value="date" {{ request('sort') === 'date' ? 'selected' : '' }}>Sort by date</option>
                  <option value="title" {{ request('sort') === 'title' ? 'selected' : '' }}>Sort by title</option>
                  </select>
               </form>
            </div>
            <h3 class="mb-0">All Events</h3>
            @if(Auth::user() && Auth::user()->role === 'admin')
            <a href="{{ route('events.create') }}" class="btn btn-secondary">Create New Event</a>
            @else
            <div style="width: 140px;">
            </div>
            @endif
         </div>
         <div class="row">
            @foreach($events as $event)
            @if(!Auth::user() || $event->organizerID !== Auth::user()->id || (Auth::user() && Auth::user()->role === 'admin'))
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card h-100 shadow">
                  <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top" alt="Event Image">
                  <div class="card-body">
                     <h5 class="card-title">{{ $event->title }}</h5>
                     <h5 class="card-subtitle mb-2 text-muted">Organized by: {{ $event->organizer->name }}</h5>
                     <p class="card-text"><i class="fas fa-calendar-alt"></i> {{ date('jS F Y H:i', strtotime($event->date)) }}</p>
                     @if(!empty($event->location))
                     <p class="card-text"><i class="fas fa-map-marker-alt"></i> Location: {{ $event->location }}</p>
                     @endif
                     @if(!empty($event->maxParticipants))
                     <p class="card-text"><i class="fas fa-users"></i> Max Participants: {{ $event->maxParticipants }}</p>
                     @endif
                  </div>
                  <div class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center bg-white">
                     <a href="{{ route('events.show', $event) }}" class="btn btn-primary mb-2 mb-md-0">View Details</a>
                     @if(Auth::user() && Auth::user()->role === 'admin')
                     <div class="btn-group">
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-secondary ml-md-2">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete the event: {{ $event->title }}?');">
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
      </div>
   </div>
</div>
@endsection