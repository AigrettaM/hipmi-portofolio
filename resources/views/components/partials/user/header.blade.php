<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50">
        </a>

        <!-- Toggle button (responsive) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav fw-bold">
                <li class="nav-item px-3">
                    <a class="nav-link position-relative text-primary {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Home
                        @if(request()->routeIs('home'))
                            <span class="position-absolute start-0 bottom-0 w-100 border-bottom border-3 border-success"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link position-relative text-primary {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        About
                        @if(request()->routeIs('about'))
                            <span class="position-absolute start-0 bottom-0 w-100 border-bottom border-3 border-success"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link position-relative text-primary {{ request()->is('hipmi-info') ? 'active' : '' }}" href="#">
                        Hipmi Info
                        @if(request()->is('hipmi-info'))
                            <span class="position-absolute start-0 bottom-0 w-100 border-bottom border-3 border-success"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link position-relative text-primary {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        Contact
                        @if(request()->routeIs('contact'))
                            <span class="position-absolute start-0 bottom-0 w-100 border-bottom border-3 border-success"></span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
