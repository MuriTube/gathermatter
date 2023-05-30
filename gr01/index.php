<!DOCTYPE html>
<html lang="en">

<head>
    <title>GatherMatter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./src/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Manrope';
            src: url('./src/fonts/static/Manrope-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Manrope';
        }

        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #0d6efd;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .nav-link:hover::after {
            transform: translateX(0);
        }
    </style>

</head>

<body>
    <script src="./src\bootstrap-5.3.0-alpha3-dist\js\bootstrap.bundle.min.js"></script>

    <!-- Navbar -->
    <?php
    include './sites/header.php';
    ?>

    <!-- Content -->
    <div style=" height: 100%;
                background-image: url('./src/assets/cool-background.svg');
                background-size: 100% 100%;
                -o-background-size: 100% 100%;
                -webkit-background-size: 100% 100%;
                background-size: cover;
                padding-top: 5px;">

        <div class="container text-center">
            <h1>Welcome to GatherMatter,</h1>
            <p>
                your comprehensive platform for all things event-related. We turn the challenge of event planning and
                ticketing into a smooth, user-friendly experience. Our mission goes beyond event management; we aim to
                create spaces for shared experiences and lasting memories. Join us in transforming gatherings into
                unforgettable events, and remember - at GatherMatter, we're not just organizing events, we're
                orchestrating memories.
            </p>
            <button type="button" class="btn btn-primary btn-lg" style="margin-bottom: 10px">More about us</button>
            <button type="button" class="btn btn-secondary btn-lg" style="margin-bottom: 10px">Contact us</button><br>
            <img src=".\src\assets\title-img-event.jpg" alt="Menschenmenge auf einer Konzert"
                class="img-fluid rounded mx-auto d-block">
        </div>
    </div>
    <!-- Verlagern in CSS Datei-->
    <div style=" height: 100%;
                background-image: url('./src/assets/cool-background-reserve.svg');
                background-size: 100% 100%;
                -o-background-size: 100% 100%;
                -webkit-background-size: 100% 100%;
                background-size: cover;
                padding-top: 30px;">
        <div class="container text-center">
            <h2>Upcoming Events</h2>
            <p>Discover the exciting events we have planned for you. From music festivals to art exhibitions, there's
                something for everyone. Don't miss out on these upcoming highlights:</p>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://placehold.co/600x400" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">Music Festival</h5>
                            <p class="card-text">Join us for a weekend filled with live performances from renowned
                                artists. Dance to the rhythm and create unforgettable memories.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Date: June 30-31, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://placehold.co/600x400" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">Art Exhibition</h5>
                            <p class="card-text">Immerse yourself in a world of creativity and imagination. Explore
                                stunning artworks and discover new perspectives.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Date: July 5-10, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://placehold.co/600x400" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title">Food Festival</h5>
                            <p class="card-text">Indulge in a culinary journey with a wide array of delicious dishes
                                from around the world. Experience the flavors that will tantalize your taste buds.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Date: August 20-22, 2023</small>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block"
                style="margin-bottom: 10px; margin-top: 10px;">Discover more</button>
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
            <!-- Inklusion von Bootstrap CSS und JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
            <div id="meinKarussell" class="carousel slide" data-bs-ride="carousel" style="display: flex;">
                <div class="carousel-inner" style="width: 100%; justify-content: center; overflow: hidden;">
                    <div class="carousel-item active" style="flex: 0 0 auto; width: 100%; max-width: none;">
                        <img src="https://placehold.co/150x150" class="d-block mx-auto" alt="Erster Slide"
                            style="border-radius: 50%; width: 150px; height: 150px;">
                        <h5 style="margin-top: 5px">Dein Titel 1</h5>
                        <p>Dein Text 1</p>
                    </div>
                    <div class="carousel-item" style="flex: 0 0 auto; width: 100%; max-width: none;">
                        <img src="https://placehold.co/150x150" class="d-block mx-auto" alt="Zweiter Slide"
                            style="border-radius: 50%; width: 150px; height: 150px;">
                        <h5 style="margin-top: 5px">Dein Titel 2</h5>
                        <p>Dein Text 2</p>
                    </div>
                    <div class="carousel-item" style="flex: 0 0 auto; width: 100%; max-width: none;">
                        <img src="https://placehold.co/150x150" class="d-block mx-auto" alt="Zweiter Slide"
                            style="border-radius: 50%; width: 150px; height: 150px;">
                        <h5 style="margin-top: 5px">Dein Titel 3</h5>
                        <p>Dein Text 3</p>
                    </div>
                    <!-- Füge mehr slides hier hinzu -->
                </div>
                <a class="carousel-control-prev" href="#meinKarussell" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Vorheriger</span>
                </a>
                <a class="carousel-control-next" href="#meinKarussell" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Nächster</span>
                </a>
            </div>
        </div>
    </div>
    <!-- naechste section-->
    <div style=" height: 100%;
                background-image: url('./src/assets/cool-background.svg');
                background-size: 100% 100%;
                -o-background-size: 100% 100%;
                -webkit-background-size: 100% 100%;
                padding-top: 5px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 padded-image">
                    <!-- Erste Spalte (1) -->
                    <img src="https://placehold.co/645x380" class="img-fluid" alt="Ihr Bild" style="margin: 25px;">
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <!-- Zweite Spalte (1,618) -->
                    <p>"Dive into the world of creativity with GatherMatter's portfolio. Explore a diverse collection of
                        events meticulously designed and managed by our esteemed clients. Witness firsthand the
                        spectacular festivals they've created using our platform, and get inspired for your own event
                        journey. Click here to venture into our gallery."</p>
                    <button type="button" class="btn btn-primary mt-2">Explore magic</button>
                </div>
            </div>
        </div>
    </div>
    <div style=" height: 100%;
                background-image: url('./src/assets/cool-background-reserve.svg');
                background-size: 100% 100%;
                -o-background-size: 100% 100%;
                -webkit-background-size: 100% 100%;
                background-size: cover;
                ">
     <div class="container px-4" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="row">
        <div class="col-4">
            <!-- Erste Spalte (33%) -->
            <h1>Überschrift</h1>
            <p>Einige Informationen oder Beschreibungen hier.</p>
        </div>
        <div class="col-4">
            <!-- Zweite Spalte (33%) -->
            <div class="card">
                <div class="card-header text-center">
                    <img src="https://placehold.co/150x150" class="rounded-circle border" alt="Teammitglied 1">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Teammitglied 1</h5>
                    <hr>
                    <p class="card-text">Einige Details über Teammitglied 1.</p>
                    <p class="card-text">Dienst: Beispiel Dienst 1.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="mailto:beispiel@email.com">Email</a> | <a href="https://discord.com">Discord</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <!-- Dritte Spalte (33%) -->
            <div class="card">
                <div class="card-header text-center">
                    <img src="https://placehold.co/150x150" class="rounded-circle border" alt="Teammitglied 2">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Teammitglied 2</h5>
                    <hr>
                    <p class="card-text">Einige Details über Teammitglied 2.</p>
                    <p class="card-text">Dienst: Beispiel Dienst 2.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="mailto:beispiel2@email.com">Email</a> | <a href="https://discord.com">Discord</a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    </div>

    <!-- Footer -->
    <?php
    include './sites/footer.php';
    ?>

</body>

</html>