<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Dropdown</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for active link styling */
        .nav-link.active {
            color: #198754 !important; /* Bootstrap 'success' green */
            border-bottom: 2px solid #198754;
        }
        /* Style for active dropdown item */
        .dropdown-item.active {
            color: #fff !important; /* Text color for active dropdown item */
            background-color: #198754 !important; /* Background color for active dropdown item */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="HIPMI Logo" height="75">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                {{-- Home --}}
                <li class="nav-item px-3">
                    <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>

                {{-- About --}}
                <li class="nav-item px-3">
                    <a class="nav-link fw-semibold text-black {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>

                {{-- Hipmi Info Dropdown --}}
                @php
                    $isHipmiInfoDropdownActive = request()->routeIs('info.*');
                @endphp
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle fw-semibold text-black {{ $isHipmiInfoDropdownActive ? 'active' : '' }}"
                       href="#" id="hipmiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hipmi Info
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="hipmiDropdown">
                        <li><a class="dropdown-item {{ request()->routeIs('info.achievers') ? 'active' : '' }}" href="{{ route('info.achievers') }}">Achievers</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('info.scholarship') ? 'active' : '' }}" href="{{ route('info.scholarship') }}">Scholarship</a></li>
                        <li><a class="dropdown-item {{ request()->routeIs('info.bootcamp') ? 'active' : '' }}" href="{{ route('info.bootcamp') }}">Bootcamp</a></li>
                    </ul>
                </li>

                {{-- Contact --}}
                <li class="nav-item px-3">
                    <a class="nav-link fw-semibold text-black {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>