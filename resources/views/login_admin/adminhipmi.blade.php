@extends('login_admin.layout')

@section('title', 'Admin Login - HIPMI PT UPI Cibiru')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="row g-0 h-100">
            <!-- Left Side - Login Form -->
            <div class="col-lg-6 col-md-12">
                <div class="login-left">
                    <!-- Logo -->
                    <div class="logo-container slide-up-element" style="animation-delay: 0.1s;">
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="HIPMI Logo" class="logo">
                    </div>
                    
                    <div class="login-form-container slide-up-element-large" style="animation-delay: 0.3s;">
                        <!-- Welcome Text -->
                        <div class="text-center mb-4">
                            <h1 class="login-title">Welcome to Admin</h1>
                            <h2 class="login-subtitle">HIPMI PT UPI CIBIRU</h2>
                        </div>
                        
                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <!-- Login Form -->
                        <form id="loginForm" action="{{ route('admin.login.post') }}" method="POST">
                            @csrf
                            
                            <!-- Username Field -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="username" 
                                       name="username" 
                                       placeholder="username" 
                                       required>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" 
                                           class="form-control" 
                                           id="password" 
                                           name="password" 
                                           placeholder="password" 
                                           required>
                                    <button type="button" 
                                            class="password-toggle" 
                                            onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Remember Me -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="remember" 
                                           name="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Hero Image -->
            <div class="col-lg-6 col-md-12">
                <div class="login-right">
                    <!-- Vector Background -->
                    <div class="vector-background slide-up-element" style="animation-delay: 0.2s;"></div>
                    
                    <!-- HIPMI Team Photo Container -->
                    <div class="hipmi-team-container slide-up-element-large" style="animation-delay: 0.5s;">
                        <img src="{{ asset('images/hipmi_team.png') }}" 
                             alt="HIPMI Team" 
                             class="hero-image"
                             onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiByeD0iMjAiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4zKSIvPgo8Y2lyY2xlIGN4PSIyMDAiIGN5PSIxNTAiIHI9IjgwIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuNCkiLz4KPHR5ZXQgeD0iMjAwIiB5PSIxNjAiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIyNCIgZm9udC13ZWlnaHQ9ImJvbGQiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC45KSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+SElQTUkgVGVhbTwvdHlwZXQ+Cjx0eXBldCB4PSIyMDAiIHk9IjE4NSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE2IiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuNykiIHRleHQtYW5jaG9yPSJtaWRkbGUiPlBvcnRvZm9saW8gV2Vic2l0ZTwvdHlwZXQ+CjwhLS0gRGVjb3JhdGl2ZSBlbGVtZW50cyAtLT4KPGNpcmNsZSBjeD0iODAiIGN5PSI4MCIgcj0iMjUiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4yKSIvPgo8Y2lyY2xlIGN4PSIzMjAiIGN5PSI2MCIgcj0iMTUiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4yKSIvPgo8Y2lyY2xlIGN4PSI2MCIgY3k9IjIyMCIgcj0iMjAiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4yKSIvPgo8Y2lyY2xlIGN4PSIzNDAiIGN5PSIyNDAiIHI9IjMwIiBmaWxsPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMikiLz4KPC9zdmc+'; this.onerror=null;">
                    </div>
                    
                    <!-- Light Effect at Bottom -->
                    <div class="light-effect slide-up-element" style="animation-delay: 0.6s;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    
    // Form submission handler
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const loginButton = document.querySelector('.btn-login');
        
        if (!username || !password) {
            e.preventDefault();
            alert('Please fill in all fields');
            return;
        }
        
        // Show loading state
        loginButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Logging in...';
        loginButton.disabled = true;
        
        // Store role in localStorage for frontend use (will be synced with session)
        let userRole = 'regular_admin';
        if (username.toLowerCase() === 'superadmin' && password === 'superadmin123') {
            userRole = 'super_admin';
        }
        
        localStorage.setItem('admin_role', userRole);
        localStorage.setItem('admin_username', username);
        
        // Let the form submit normally to server
        // The server will validate and set the session
    });
    
    // Add smooth transitions
    document.addEventListener('DOMContentLoaded', function() {
        // Trigger animasi slide up saat halaman dimuat
        const slideUpElements = document.querySelectorAll('.slide-up-element');
        const slideUpElementsLarge = document.querySelectorAll('.slide-up-element-large');
        
        // Trigger animasi untuk elemen slide-up biasa
        slideUpElements.forEach((element, index) => {
            setTimeout(() => {
                element.classList.add('animate-slide-up');
            }, 100 * index); // Delay bertahap
        });
        
        // Trigger animasi untuk elemen slide-up-large
        slideUpElementsLarge.forEach((element, index) => {
            setTimeout(() => {
                element.classList.add('animate-slide-up-large');
            }, 200 + (150 * index)); // Delay sedikit lebih lama
        });
        
        // Form control transitions yang sudah ada
        const formControls = document.querySelectorAll('.form-control');
        
        formControls.forEach(control => {
            control.addEventListener('focus', function() {
                this.style.transform = 'scale(1.02)';
            });
            
            control.addEventListener('blur', function() {
                this.style.transform = 'scale(1)';
            });
        });
    });
</script>
@endsection
