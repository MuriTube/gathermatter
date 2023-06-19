<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Local CSS files -->
    @vite('resources/css/custom.css')
    @vite('resources/css/bootstrap.min.css')

    <!-- Local Fonts (EB) -->
    @vite('css/app.css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @media (max-width: 992px) { /* Anpassung je nach Bedarf */
            .btn-group {
                position: absolute;
                right: 80px; /* Anpassung je nach Bedarf */
                top: 25px; /* Anpassung je nach Bedarf */
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" style=" box-shadow: 0 4.5px 2px -2px rgba(0, 0, 0, 0.1);">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('images/logo-black.png') }}" alt="logo" width="60px" height="60px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutus') }}">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div style="position: relative; max-width: 35%;">
                    <form class="d-flex mt-2 mt-lg-0" role="search" id="search-form">
                        <input class="form-control me-2" type="search" placeholder="Search in Events" aria-label="Search" style="height: 30px;" id="search-input">
                      <!-- Auskommentiert weil Live Anzeige <button class="btn btn-sm btn-primary" style="height: 30px; margin-right: 20px;" type="submit">Search</button> -->
                    </form>
                <div id="search-results" class="position-absolute bg-white p-2 mt-2" style="display: none; z-index: 999; right: 0;"></div>
                </div>
                    <button class="btn btn-link text-dark text-decoration-none">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        @if(isset($cartItemCount) && $cartItemCount > 0)
                            <span class="badge bg-danger">{{ $cartItemCount }}</span>
                        @endif
                    </a></button>

                    <div class="d-flex btn-group-responsive">
                        @guest
                            @if (Route::has('login'))
                                <button onclick="window.location.href='{{ route('login') }}';" type="button" class="btn btn-sm btn-secondary" style="margin-right: 5px;">Login</button>
                            @endif
                            @if (Route::has('register'))
                                <button onclick="window.location.href='{{ route('register') }}';" type="button" class="btn btn-sm btn-primary">Register</button>
                            @endif
                        @else
                            <div class="btn-group">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @if (Auth::user()->role == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">
                                            Adminpanel
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    My Profile
                                    </a>
                                    <button class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="{{ route('imprint') }}" class="nav-link px-2 text-muted">Imprint</a></li>
                    <li class="nav-item"><a href="{{ route('terms') }}" class="nav-link px-2 text-muted">Terms & Conditions</a></li>
                    <li class="nav-item"><a href="{{ route('privacypolicy') }}" class="nav-link px-2 text-muted">Privacy policy</a></li>
                </ul>
                <p class="text-center text-muted">GatherMatter&copy; 2023</p>
            </footer>
        </div>
    </div>
    @vite('resources/js/custom.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div id="cookie-banner" class="cookie-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="cookie-message text-center">
                        <p class="mb-3">We use cookies to enhance your experience on our website. By continuing to browse this site, you consent to the use of cookies.</p>
                        <p class="text-muted">Please note that by not accepting cookies, some features and functionalities of the website may be limited.</p>
                        <div class="text-center">
                            <button class="btn btn-primary accept-button">Accept</button>
                            <br><br>
                            <a href="{{ route('privacypolicy') }}" class="privacy-link">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
