@extends('layouts.app')
@section('content')
<div class="preloader">
    <div class="loader"></div>
  </div>

  <div class="section-background-first">
    <section id="our-story" class="py-5">
      <h2 class="text-center mb-4">About us</h2>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Our Story</h3>
            <p>At GatherMatter, we believe that events bring people together and create unforgettable experiences. Our
              story began years ago when we came together to develop an innovative event management and ticketing system
              that supports organizers in planning and executing seamless and successful events. We are committed to
              revolutionizing the event industry and providing event participants with an unparalleled experience.</p>
          </div>
          <div class="col-md-6 text-center">
            <img style="width:400px; height:auto; border-radius: 5px;" src="{{ asset('images/aboutusimg.jpg') }}" alt="Our Story Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>


    <section id="our-mission" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Our Mission</h3>
            <p>Our mission is to help organizers create exceptional events that bring people together, provide
              inspiration, and create lasting memories. With our user-friendly and powerful organizer tool, event
              organizers can efficiently plan events, sell tickets, manage participants, and more. At the same time, we
              aim to offer event participants a seamless and comfortable experience by providing easy ticket booking,
              secure payment methods, and personalized event information.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="who-we-are" class="py-5">
      <div class="container">
        <h3>Who we are</h3>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Event Experts</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#text1"
                  aria-expanded="false" aria-controls="text1">More</a>
                <div class="collapse" id="text1">
                  <p> We are a team of dedicated event professionals who bring expertise in event planning, marketing,
                    and logistics. With our in-depth knowledge of the industry, we understand the intricacies of
                    organizing successful events and strive to provide our customers with the best solutions.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tech Enthusiasts</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#text2"
                  aria-expanded="false" aria-controls="text2">More</a>
                <div class="collapse" id="text2">
                  <p>As passionate technologists, we combine our love for events with our expertise in software
                    development and design. We leverage cutting-edge technologies to create innovative solutions that
                    streamline event management processes and enhance the overall event experience.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Customer-Focused</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#text3"
                  aria-expanded="false" aria-controls="text3">More</a>
                <div class="collapse" id="text3">
                  <p> We prioritize our customers and their needs. We listen attentively to their feedback, understand
                    their goals, and continuously improve our platform to meet their evolving requirements. Our goal is
                    to build long-lasting relationships with our customers and support them throughout their event
                    journey.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="trusted-by" class="py-5">
      <div class="container">
        <h3 class="text-center mb-4">Trusted by</h3>
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('images/organizer-logo1.png') }}" alt="Logo 1" class="img-fluid mx-auto d-block">
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/organizer-logo2.png') }}" alt="Logo 2" class="img-fluid mx-auto d-block">
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/organizer-logo3.png') }}" alt="Logo 3" class="img-fluid mx-auto d-block">
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
