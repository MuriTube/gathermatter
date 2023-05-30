<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top"
    style=" box-shadow: 0 4.5px 2px -2px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <a class="navbar-brand" href="/gr01/index.php">
            <img src="/gr01/src/assets/logo-black.png" alt="logo" width="60px" height="60px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/gr01/sites/events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gr01/sites/about-us.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gr01/sites/portfolio.php">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gr01/sites/contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <form class="d-flex mt-2 mt-lg-0" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    style="height: 30px;">
                <button class="btn btn-sm btn-primary" style="height: 30px; margin-right: 20px;"
                    type="submit">Search</button>
            </form>
            <div class="d-flex btn-group-responsive">
                <button onclick="window.location.href='/gr01/login/register.html';" type="button"
                    class="btn btn-sm btn-primary" style="margin-right: 5px;">Register</button>
                <button onclick="window.location.href='/gr01/login/login.html';" type="button"
                    class="btn btn-sm btn-secondary">Login</button>
            </div>
            <!-- Hier Einkaufswagen implementieren wenn Eingeloggt -->
        </div>
    </div>
</nav>