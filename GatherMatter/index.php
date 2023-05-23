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
                padding-top: 5px;">
        <div class="container text-center">
            <p>hallo Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore error beatae quas debitis, tempora
                perferendis, repellendus adipisci molestias amet commodi veritatis similique reiciendis officiis
                accusamus. Dolores ullam, maxime libero maiores est deleniti! Assumenda cum iusto ullam earum nihil
                molestias sunt, unde voluptatibus deleniti. Nam ea eum voluptatem aliquam impedit reprehenderit, eius
                neque adipisci incidunt dolorum similique fuga blanditiis dolore nihil beatae pariatur eos officia
                cumque consequatur illo molestias enim? Debitis voluptatibus sed dolores molestias rerum tempore fuga
                voluptas quam culpa porro suscipit obcaecati vitae nihil dignissimos architecto excepturi, ipsum tempora
                quos delectus odit necessitatibus accusamus. Qui laborum fugiat voluptatibus assumenda nesciunt
                accusamus quo libero at sapiente? Nam impedit eius provident eaque recusandae alias voluptatem,
                quibusdam non pariatur assumenda itaque inventore facere dicta ipsam perspiciatis fugiat beatae odio
                numquam nemo voluptates fuga ducimus! Rerum accusamus eius aperiam cum in sapiente placeat amet nostrum,
                officiis deserunt quibusdam quod eveniet hic ab porro ipsum repudiandae quam nulla voluptates incidunt!
                Libero nam amet optio eligendi veniam. Rerum velit iusto aliquam illum nostrum sequi voluptatem dolorem
                nobis, fuga, esse, praesentium laborum qui minus illo repellendus quasi. Est rem quo labore, vitae magni
                doloremque iste alias? Dignissimos cupiditate in saepe non quam optio deserunt recusandae debitis quis
                cumque voluptates corrupti iste voluptatum earum iure laboriosam delectus, sed aspernatur fuga nesciunt
                atque alias enim. Minus eaque deserunt corporis dignissimos?
            <p>
        </div>
    </div>



    <!-- Footer -->
    <?php
    include './sites/footer.php';
    ?>

</body>

</html>