@extends('layouts.app')
@section('content')
<div class="preloader">
    <div class="loader"></div>
  </div>
      <div class="section-background-first">
<section id="upcoming-events" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://placehold.co/600x400" alt="Event 1" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h5>Event 1</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus finibus varius.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Date: 1. Januar 2024</p>
                            </div>
                            <div class="col-md-4">
                                <p>Time: 10:00 AM</p>
                            </div>
                            <div class="col-md-4">
                                <p>Cost: $10</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-secondary">More about</button>
                            <button class="btn btn-primary mb-1 mb-md-0 ms-2">Add to Cart</button>
                        </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://placehold.co/600x400" alt="Event 2" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h5>Event 2</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus finibus varius.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Date: 15. Februar 2024</p>
                            </div>
                            <div class="col-md-4">
                                <p>Time: 2:00 PM</p>
                            </div>
                            <div class="col-md-4">
                                <p>Cost: $20</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-secondary">More about</button>
                            <button class="btn btn-primary mb-1 mb-md-0 ms-2">Add to Cart</button>
                        </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <img src="https://placehold.co/600x400" alt="Event 3" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <h5>Event 3</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus finibus varius.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Date: 30. März 2024</p>
                            </div>
                            <div class="col-md-4">
                                <p>Time: 6:00 PM</p>
                            </div>
                            <div class="col-md-4">
                                <p>Cost: $15</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-secondary">More about</button>
                            <button class="btn btn-primary mb-1 mb-md-0 ms-2">Add to Cart</button>
                        </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
</div>
@endsection