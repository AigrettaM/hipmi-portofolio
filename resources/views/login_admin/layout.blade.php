<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HIPMI PT UPI Cibiru')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700;800;900&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('{{ asset("images/upi.png") }}') center/cover no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(1px);
            z-index: 0;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            justify-content: center;
            padding: 0;
            position: relative;
            z-index: 1;
        }
        
        .login-card {
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            border: none;
            width: 100%;
            height: 100vh;
            max-width: none;
        }
        
        .login-left {
            background: rgba(248, 249, 250, 0.15);
            backdrop-filter: blur(3px);
            padding: 40px 60px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(248, 249, 250, 0.2) 0%, rgba(255, 255, 255, 0.15) 100%);
            z-index: 1;
        }
        
        /* Mobile specific background enhancement */
        @media (max-width: 768px) {
            .login-left {
                background: rgba(248, 249, 250, 0.25);
                backdrop-filter: blur(5px);
            }
            
            .login-left::before {
                background: linear-gradient(135deg, rgba(248, 249, 250, 0.3) 0%, rgba(255, 255, 255, 0.2) 100%);
            }
        }
        
        .logo-container {
            position: absolute;
            top: 25px;
            left: 40px;
            z-index: 15;
        }
        
        .login-form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px 28px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            max-width: 320px;
            width: 85%;
            margin: 60px auto 0 auto;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .form-field {
            width: 92.87px;
            height: 20px;
            position: relative;
        }
        
        .username-field {
            top: 265.94px;
            left: 142.12px;
        }
        
        .password-field {
            width: 106.86px;
            top: 352.45px;
            left: 142.12px;
        }
        
        .login-right {
            background: rgba(248, 249, 250, 0.15);
            backdrop-filter: blur(3px);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .login-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(248, 249, 250, 0.2) 0%, rgba(255, 255, 255, 0.15) 100%);
            z-index: 1;
        }
        
        .vector-background {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            background: url('{{ asset("images/vektor.png") }}') center bottom 1% no-repeat;
            background-size: 95%;
            opacity: 1;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        /* Animation untuk elemen muncul dari bawah */
        @keyframes slideUpFadeIn {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideUpFadeInLarge {
            0% {
                transform: translateY(80px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Kelas untuk animasi */
        .animate-slide-up {
            animation: slideUpFadeIn 0.8s ease-out forwards;
        }

        .animate-slide-up-large {
            animation: slideUpFadeInLarge 1s ease-out forwards;
        }

        /* State awal - hidden */
        .slide-up-element {
            opacity: 0;
            transform: translateY(50px);
        }

        .slide-up-element-large {
            opacity: 0;
            transform: translateY(80px);
        }
        
        .logo {
            width: 100px;
            height: auto;
        }
        
        .login-title {
            color: #2c5530;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 24px;
            line-height: 100%;
            letter-spacing: 0%;
            text-align: center;
            margin-bottom: 6px;
        }
        
        .login-subtitle {
            color: #f4ca4c;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 18px;
            line-height: 100%;
            letter-spacing: 0%;
            text-align: center;
            margin-bottom: 25px;
        }
        
        .form-label {
            color: #03663C;
            font-family: 'Lato', sans-serif;
            font-weight: 900;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 1px solid rgba(3, 102, 60, 0.1);
            background: rgba(248, 249, 250, 0.8);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            padding: 12px 16px;
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            font-size: 14px;
            line-height: 100%;
            letter-spacing: 0%;
            margin-bottom: 16px;
            transition: all 0.3s ease;
            width: 100%;
            height: 18px;
            min-height: 44px;
        }
        
        .form-control:focus {
            background: rgba(233, 236, 239, 0.9);
            border-color: #03663C;
            box-shadow: 0 0 0 0.2rem rgba(44, 85, 48, 0.25);
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            color: #6c757d;
            cursor: pointer;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #03663C 0%, #52FFB6 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            font-size: 14px;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
            color: white;
            box-shadow: 0 6px 16px rgba(3, 102, 60, 0.25);
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #025530 0%, #45E6A3 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(3, 102, 60, 0.35);
            color: white;
        }
        
        .form-check-label {
            color: #6c757d;
            font-size: 14px;
        }
        
        .hero-image {
            max-width: 90%;
            height: auto;
            border-radius: 20px;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 4;
            margin: 0;
        }
        
        .hipmi-team-container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            z-index: 4;
        }
        
        .light-effect {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.4) 0%, rgba(255, 255, 255, 0.1) 50%, transparent 100%);
            z-index: 5;
            pointer-events: none;
            /* Smooth gradient to avoid split line */
            filter: blur(20px);
        }
        
        @media (max-width: 768px) {
            .login-left {
                padding: 40px 30px;
                height: auto;
                min-height: 100vh;
                justify-content: center;
            }
            
            .logo-container {
                top: 30px;
                left: 30px;
            }
            
            .login-form-container {
                padding: 25px 22px;
                margin: 40px auto 0 auto;
                max-width: 300px;
                width: 92%;
            }
            
            /* Hide right side completely on mobile */
            .login-right {
                display: none !important;
            }
            
            /* Make left side full width on mobile */
            .col-lg-6.col-md-12:first-child {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }
            
            .login-title {
                font-size: 26px;
            }
            
            .login-subtitle {
                font-size: 20px;
            }
            
            .form-label {
                font-size: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .login-left {
                padding: 30px 20px;
                justify-content: center;
            }
            
            .logo-container {
                top: 25px;
                left: 20px;
            }
            
            .logo {
                width: 80px;
            }
            
            .login-form-container {
                padding: 22px 20px;
                margin: 35px auto 0 auto;
                border-radius: 18px;
                max-width: 280px;
                width: 90%;
            }
            
            /* Ensure right side is hidden on small mobile too */
            .login-right {
                display: none !important;
            }
            
            /* Make left side full width on small mobile */
            .col-lg-6.col-md-12:first-child {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }
            
            .login-title {
                font-size: 24px;
            }
            
            .login-subtitle {
                font-size: 18px;
            }
            
            .form-label {
                font-size: 14px;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    @yield('content')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @yield('scripts')
</body>
</html>
