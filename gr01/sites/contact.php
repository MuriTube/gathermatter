<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/gr01/src/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/gr01/src/bootstrap-5.3.0-alpha3-dist/css/costum.css">
  <title>Contact</title>
</head>

<body>
  <script src="/gr01/src/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/gr01/sites/header.php');

  ?>

  <div class="section-background-first">
    <<section id="contact" class="py-5">
      <div class="container">
        <h2 class="text-center mb-4">Contact</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="contact-info-box text-center">
              <a href="tel:+43123456789">
                <i><img style="width:50px; height:auto;" src="/gr01/src/assets/anruf.png" alt="Icon"></i>
                <h5 class="text-primary">Phone</h5>
              </a>
              <p>+43 123 456 789</p>

            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-info-box text-center">
              <a href="mailto:info@gathermatter.com">
                <i><img style="width:50px; height:auto;" src="/gr01/src/assets/mail.png" alt="Icon"></i>
                <h5 class="text-primary">E-Mail</h5>
              </a>
              <p>info@gathermatter.com</p>

            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-info-box text-center">
              <a href="https://www.google.com/maps?q=Musterstra%C3%9Fe+123,+12345+Musterstadt" target="_blank">
                <i><img style="width:50px; height:auto;" src="/gr01/src/assets/map.png" alt="Icon"></i>
                <h5 class="text-primary">Adress</h5>
              </a>
              <p>Musterstraße 123, 12345 Musterstadt</p>
            </div>
          </div>
        </div>
      </div>
      </section>



      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 p-0">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.9124093048786!2d15.209642615956548!3d46.80046687913869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4771dc9a82630815%3A0xb85ac4d9f836c9b3!2sEibiswald%2C%20Steiermark!5e0!3m2!1sen!2sat!4v1624542960194!5m2!1sen!2sat"
              width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
      </section>
  </div>

  <?php
  include($_SERVER['DOCUMENT_ROOT'] . '/gr01/sites/footer.php');

  ?>
</body>

</html>