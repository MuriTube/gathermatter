@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<div class="preloader">
    <div class="loader"></div>
  </div>
<div class="section-background-first">
  <!-- Gallery Section -->
  <section class="gallery-section py-5">
    <div class="container">
      <h2 class="text-center mb-4">Gallery</h2>
      <p class="text-center mb-4">Welcome to our gallery, a carefully curated collection that captures the beauty and
        diversity of our world. Through the lens of our talented photographers, experience a visual journey across
        landscapes, cultures, and moments in time. Each image tells a unique story, a testament to the power of
        photography. Browse through our selection and let the images inspire and move you. Enjoy the gallery.</p>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="{{ asset('images/1.jpg') }}" data-lightbox="gallery">
            <img class="img-fluid" src="{{ asset('images/1.jpg') }}" alt="">
          </a>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="{{ asset('images/2.jpg') }}" data-lightbox="gallery">
            <img class="img-fluid" src="{{ asset('images/2.jpg') }}" alt="">
          </a>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="{{ asset('images/3.jpg') }}" data-lightbox="gallery">
            <img class="img-fluid" src="{{ asset('images/3.jpg') }}" alt="">
          </a>
        </div>
        <!-- Add more images as needed -->
      </div>
    </div>
  </section>
</div>
  <!-- Javascripts -->
  <script src="https://code.y.com/jquerjquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
  @endsection