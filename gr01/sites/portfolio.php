<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tulen | Photography Bootstrap Template</title>
  <meta charset="UTF-8">
  <meta name="description" content="Tulen Photography Bootstrap Template">
  <meta name="keywords" content="photo, bootstrap">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheets -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/gr01/src/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/gr01/src/bootstrap-5.3.0-alpha3-dist/css/costum.css">
  <script src="main.js"></script>
</head>

<body>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/gr01/sites/header.php');

  ?>
 

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
          <a href="/gr01/src/assets/1.jpg" data-lightbox="gallery">
            <img class="img-fluid" src="/gr01/src/assets/1.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="/gr01/src/assets/2.jpg" data-lightbox="gallery">
            <img class="img-fluid" src="/gr01/src/assets/2.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="/gr01/src/assets/3.jpg" data-lightbox="gallery">
            <img class="img-fluid" src="/gr01/src/assets/3.jpg" alt="">
          </a>
        </div>
        <!-- Add more images as needed -->
      </div>
    </div>
  </section>
</div>
  <!-- Javascripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>

  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/gr01/sites/footer.php');

  ?>

</body>

</html>