@extends('layouts.app')
@section('content')
    <div class="preloader">
        <div class="loader"></div>
    </div>
    <div class="bg-imagecostum">
        <div class="dark-overlaycostum"></div>
        <div class="centered-textcostum" style="max-width: 95%; margin: auto;">
            <h1 class="display-3" style="text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5); padding-bottom:20px;">Welcome to
                GatherMatter
            </h1>
            <h3>Revolutionizing Festivity - Seamless Hosting and Ticketing</h3>
            <a href="{{ route('aboutus') }}" class="btn btn-primary btn-lg mt-5">About us</a>
        </div>
    </div>
    <div class="section-background-first">
        <div class="row justify-content-center"
             style="margin-right:20px; margin-left:20px; padding-top:20px; padding-bottom:20px;">
            <div class="container text-center py-1">
                <h2>Upcoming Events</h2>
                <p>Discover the exciting events we have planned for you. From music festivals to art exhibitions,
                    there's
                    something for everyone.<br>Don't miss out on these upcoming highlights:
                </p>
            </div>
            @foreach($upcomingEvents as $event)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h5 class="card-subtitle mb-2 text-muted">Organized by: {{ $event->organizer->name }}</h5>
                            <p class="card-text"><i
                                    class="fas fa-calendar-alt"></i> {{ date('jS F Y H:i', strtotime($event->date)) }}
                            </p>
                            @if(!empty($event->location))
                                <p class="card-text"><i class="fas fa-map-marker-alt"></i>
                                    Location: {{ $event->location }}</p>
                            @endif
                            @if(!empty($event->maxParticipants))
                                <p class="card-text"><i class="fas fa-users"></i> Max
                                    Participants: {{ $event->maxParticipants }}</p>
                            @endif
                        </div>
                        <div
                            class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center bg-white">
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary mb-2 mb-md-0">View
                                Details</a>
                            @if(Auth::user() && Auth::user()->role === 'admin')
                                <div class="btn-group">
                                    <a href="{{ route('events.edit', $event) }}"
                                       class="btn btn-secondary ml-md-2">Edit</a>
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete the event: {{ $event->title }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-md-2">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-4">
                <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg">Discover More</a>
            </div>
        </div>
    </div>
    <div style="height: 100%;
	background-color:#070606;
	padding-top: 30px;
	color: white;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
	0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="container text-center">
            <h2>Opinions of event organizers</h2>
            <div id="meinKarussell" class="carousel slide" data-bs-ride="carousel"
                 style="display: flex; padding-bottom: 50px; padding-top: 20px;">
                <div class="carousel-inner" style="width: 100%; justify-content: center; overflow: hidden;">
                    <div class="carousel-item active" style="flex: 0 0 auto; width: 100%; max-width: none;">
                        <img src="{{ asset('images/organizer-logo1.png') }}" class="d-block mx-auto" alt="Erster Slide"
                             style="border-radius: 50%; width: 150px; height: 150px;">
                        <h5 style="margin-top: 10px">Music House Production Co.</h5>
                        <p style="max-width: 60%; margin: auto;">"GatherMatter has fundamentally transformed our music
                            event management with its unparalleled service. Their proactive support and innovative
                            features have consistently exceeded our expectations."
                        </p>
                    </div>
                    <div class="carousel-item" style="flex: 0 0 auto; width: 100%; max-width: none;">
                        <img src="{{ asset('images/organizer-logo2.png') }}" class="d-block mx-auto" alt="Zweiter Slide"
                             style="border-radius: 50%; width: 150px; height: 150px;">
                        <h5 style="margin-top: 10px">Street Food Barello</h5>
                        <p style="max-width: 60%; margin: auto;">"Our street food events have seen significant
                            improvements through GatherMatter. The user-friendly platform has made event organization
                            easier and more efficient. It has become an indispensable part of our business."
                        </p>
                    </div>
                    <div class="carousel-item" style="flex: 0 0 auto; width: 100%; max-width: none;">
                        <img src="{{ asset('images/organizer-logo3.png') }}" class="d-block mx-auto" alt="Zweiter Slide"
                             style="border-radius: 50%; width: 150px; height: 150px;">
                        <h5 style="margin-top: 10px">Diacore Art Gallery</h5>
                        <p style="max-width: 60%; margin: auto;">"GatherMatter has revolutionized the way we handle our
                            art events. From managing attendees to coordinating schedules, everything is simplified. We
                            appreciate their commitment to delivering top-quality service."
                        </p>
                    </div>
                    <!-- Füge mehr slides hier hinzu -->
                </div>
                <a class="carousel-control-prev" href="#meinKarussell" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
                <a class="carousel-control-next" href="#meinKarussell" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
            </div>
        </div>
    </div>
    <div class="section-background-first">
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-7 padded-image">
                    <img src="{{ asset('images/portfolio-img.jpg') }}" class="img-fluid" alt="Ihr Bild"
                         style="border-radius:5px; width: 80%; height: auto;">
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center text-center">
                    <p>"Dive into the world of creativity with GatherMatter's portfolio. Explore a diverse collection of
                        events meticulously designed and managed by our esteemed clients. Witness firsthand the
                        spectacular festivals they've created using our platform, and get inspired for your own event
                        journey. Click here to venture into our gallery."
                    </p>
                    <a style="margin-bottom: 25px; margin-top: 10px;" href="{{ route('portfolio') }}"
                       class="btn btn-primary btn-lg">Explore Magic</a>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2>Our team</h2>
                    <p class="mx-auto" style="max-width: 80%;">"Meet our dedicated team, relentlessly committed to
                        enhancing your experience."
                    </p>
                </div>
                <div class="col-lg-6 d-flex flex-row align-items-center justify-content-around">
                    <div class="team-member text-center">
                        <img src="{{ asset('images/team1.png') }}" alt="Teammitglied 1"
                             style="width: 170px; height: auto; border-radius:5px;">
                        <h4>Murilo Bauer</h4>
                        <p>Chief Executive Officer (CEO)</p>
                    </div>
                    <div class="team-member text-center">
                        <img src="{{ asset('images/team2.png') }}" alt="Teammitglied 2"
                             style="width: 170px; height: auto; border-radius:5px;">
                        <h4>Emirhan Bekmez</h4>
                        <p>Chief Technology Officer (CTO)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
