<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - HIPMI PT UPI Cibiru')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            transition: all 0.3s ease;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            height: 100vh;
            background: #ffffff;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
            opacity: 0;
            animation: slideInLeft 0.7s ease-out forwards;
        }
        
        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-20px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .sidebar-logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        
        .sidebar-logo img {
            width: 60px;
            height: auto;
        }
        
        .sidebar-nav {
            padding: 20px 0;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            background: none;
        }
        
        .nav-link:hover {
            background-color: #f8f9fa;
            color: #2c5530;
        }
        
        .nav-link.active {
            background-color: #2c5530;
            color: white;
            position: relative;
        }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #52FFB6;
        }
        
        .nav-link i {
            width: 20px;
            margin-right: 12px;
            font-size: 16px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            background-color: #f8f9fa;
            opacity: 0;
            animation: fadeInMain 0.8s ease-out 0.2s forwards;
        }
        
        @keyframes fadeInMain {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Header */
        .admin-header {
            background: white;
            padding: 20px 32px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
            position: relative;
            opacity: 0;
            animation: slideDownFadeIn 0.6s ease-out 0.1s forwards;
        }
        
        @keyframes slideDownFadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: #2c5530;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-btn:hover {
            background-color: #f8f9fa;
        }
        
        /* Mobile overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            transition: opacity 0.3s ease;
        }
        
        .sidebar-overlay.show {
            display: block;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c5530;
            margin: 0;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 22px;
            color: #6c757d;
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .notification-btn:hover {
            background-color: #f8f9fa;
            color: #2c5530;
        }
        
        .notification-btn .badge {
            position: absolute;
            top: 0px;
            right: 0px;
            background-color: #dc3545;
            color: white;
            font-size: 10px;
            padding: 3px 6px;
            border-radius: 50%;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .user-profile:hover {
            background-color: #f8f9fa;
        }
        
        /* Profile Dropdown Styles */
        .profile-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: 1px solid #e9ecef;
            min-width: 180px;
            z-index: 1001;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            margin-top: 8px;
        }
        
        .profile-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .profile-dropdown::before {
            content: '';
            position: absolute;
            top: -6px;
            right: 20px;
            width: 12px;
            height: 12px;
            background: white;
            border: 1px solid #e9ecef;
            border-bottom: none;
            border-right: none;
            transform: rotate(45deg);
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 6px;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #dc3545;
        }
        
        .logout-item {
            color: #dc3545;
            border-top: 1px solid #e9ecef;
            margin-top: 0;
            border-radius: 0 0 6px 6px;
        }
        
        .logout-item:hover {
            background-color: #fff5f5;
            color: #dc3545;
        }
        
        .dropdown-item i {
            margin-right: 10px;
            width: 16px;
            font-size: 14px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e9ecef;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .user-name {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            margin: 0;
            line-height: 1.2;
        }
        
        .user-role {
            font-size: 12px;
            color: #6c757d;
            margin: 0;
            line-height: 1.2;
        }
        
        /* Content Area */
        .content-area {
            padding: 24px;
            animation: slideUpFadeIn 0.6s ease-out;
        }
        
        /* Beautiful slide up animations */
        @keyframes slideUpFadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideUpStagger {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Staggered animations for different elements */
        .animate-card {
            animation: slideUpStagger 0.8s ease-out;
            animation-fill-mode: both;
        }
        
        .animate-card:nth-child(1) { animation-delay: 0.1s; }
        .animate-card:nth-child(2) { animation-delay: 0.2s; }
        .animate-card:nth-child(3) { animation-delay: 0.3s; }
        .animate-card:nth-child(4) { animation-delay: 0.4s; }
        .animate-card:nth-child(5) { animation-delay: 0.5s; }
        .animate-card:nth-child(6) { animation-delay: 0.6s; }
        
        /* Table and form animations */
        .table-container {
            animation: slideUpStagger 0.8s ease-out;
            animation-delay: 0.3s;
            animation-fill-mode: both;
        }
        
        .form-container {
            animation: slideUpStagger 0.7s ease-out;
            animation-delay: 0.2s;
            animation-fill-mode: both;
        }
        
        /* Button hover animations */
        .btn-primary-custom {
            background: linear-gradient(135deg, #2c5530 0%, #52FFB6 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transform: translateY(0);
            position: relative;
            overflow: hidden;
        }
        
        /* Page transition overlay */
        .page-transition-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #2c5530 0%, #52FFB6 100%);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            transform: scale(0);
            transform-origin: center;
        }
        
        .page-transition-overlay.active {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
        }
        
        .page-transition-content {
            color: white;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: pulseContent 1.5s ease-in-out infinite;
        }
        
        @keyframes pulseContent {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.05); }
        }
        
        .page-transition-spinner {
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Enhanced button click effect */
        .btn-primary-custom.clicked {
            transform: scale(0.95);
            box-shadow: 0 0 30px rgba(82, 255, 182, 0.8);
            transition: all 0.2s ease;
        }
        
        /* Special animation for page origin */
        .page-from-button {
            animation: expandFromButton 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards !important;
        }
        
        @keyframes expandFromButton {
            0% {
                opacity: 0;
                transform: scale(0.1);
                transform-origin: var(--button-x, center) var(--button-y, center);
                filter: blur(5px);
            }
            40% {
                opacity: 0.6;
                transform: scale(0.6);
                filter: blur(2px);
            }
            70% {
                opacity: 0.9;
                transform: scale(1.02);
                filter: blur(0px);
            }
            100% {
                opacity: 1;
                transform: scale(1);
                filter: blur(0px);
            }
        }
        
        /* Card Styles */
        .admin-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideUpStagger 0.7s ease-out;
        }
        
        /* Welcome Message with animation */
        .welcome-card {
            background: linear-gradient(135deg, #2c5530 0%, #52FFB6 100%);
            color: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            animation: slideUpFadeIn 0.8s ease-out;
        }
        
        .card-header-custom {
            background: #2c5530;
            color: white;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 16px;
        }
        
        .card-body-custom {
            padding: 24px;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label-custom {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }
        
        .form-control-custom {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }
        
        .form-control-custom:focus {
            outline: none;
            border-color: #2c5530;
            box-shadow: 0 0 0 3px rgba(44, 85, 48, 0.1);
            background-color: white;
        }
        
        .file-input-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .file-input-custom {
            display: none;
        }
        
        .file-input-label {
            display: inline-block;
            padding: 8px 16px;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            color: #495057;
            transition: all 0.3s ease;
        }
        
        .file-input-label:hover {
            background-color: #dee2e6;
        }
        
        .file-info {
            margin-left: 12px;
            font-size: 12px;
            color: #6c757d;
        }
        
        /* Button Styles */
        .btn-primary-custom {
            background: linear-gradient(135deg, #2c5530 0%, #52FFB6 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #1e3b22 0%, #45E6A3 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(44, 85, 48, 0.3);
            color: white;
        }
        
        /* Special hover effect for add buttons */
        .btn-add-data:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(82, 255, 182, 0.4);
            animation: buttonGlow 1.5s ease-in-out infinite;
        }
        
        @keyframes buttonGlow {
            0%, 100% { 
                box-shadow: 0 10px 25px rgba(82, 255, 182, 0.4);
            }
            50% { 
                box-shadow: 0 10px 30px rgba(82, 255, 182, 0.6);
            }
        }
        
        /* Welcome Message */
        .welcome-card {
            background: linear-gradient(135deg, #2c5530 0%, #52FFB6 100%);
            color: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }
        
        .welcome-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            animation: slideUpStagger 0.9s ease-out;
        }
        
        .welcome-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
            animation: slideUpStagger 1s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .admin-header {
                padding: 12px 16px;
            }
            
            .content-area {
                padding: 16px;
            }
            
            .page-title {
                font-size: 20px;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .header-actions {
                gap: 10px;
            }
        }
        
        /* High DPI/Zoom adjustments */
        @media (min-resolution: 1.5dppx) {
            .sidebar {
                width: 260px;
                animation: slideInLeft 0.6s ease-out forwards;
            }
            
            .main-content {
                margin-left: 260px;
                animation: fadeInMain 0.7s ease-out 0.2s forwards;
            }
            
            /* Maintain smooth animations at high zoom */
            .content-area {
                animation: slideUpFadeIn 0.6s ease-out;
            }
        }
        
        @media (min-resolution: 2dppx) {
            .sidebar {
                width: 240px;
                animation: slideInLeft 0.5s ease-out forwards;
            }
            
            .main-content {
                margin-left: 240px;
                animation: fadeInMain 0.6s ease-out 0.15s forwards;
            }
            
            .admin-header {
                padding: 16px 24px;
                animation: slideDownFadeIn 0.5s ease-out 0.1s forwards;
            }
            
            .page-title {
                font-size: 24px;
            }
            
            .nav-link {
                padding: 10px 20px;
                font-size: 13px;
            }
            
            .sidebar-logo {
                padding: 16px;
            }
            
            .sidebar-logo img {
                width: 50px;
            }
            
            /* Optimize animations for high zoom */
            .content-area {
                animation: slideUpFadeIn 0.5s ease-out;
            }
            
            .admin-card {
                animation: slideUpStagger 0.6s ease-out;
            }
        }
        
        /* Mobile responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                width: 280px;
                z-index: 1001;
                animation: none; /* Reset animation for mobile */
                opacity: 1;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
                animation: fadeInMain 0.6s ease-out forwards;
            }
            
            .mobile-menu-btn {
                display: block !important;
            }
            
            .sidebar-overlay.show {
                display: block;
            }
            
            /* Mobile optimized animations */
            .content-area {
                animation: slideUpFadeIn 0.5s ease-out;
                padding: 16px;
            }
            
            .admin-card {
                animation: slideUpStagger 0.6s ease-out;
            }
            
            .welcome-card {
                animation: slideUpFadeIn 0.7s ease-out;
            }
            
            .admin-header {
                animation: slideDownFadeIn 0.5s ease-out forwards;
            }
            
            /* Mobile page transition adjustments */
            .page-from-button {
                animation: expandFromButton 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards !important;
            }
            
            .page-transition-content {
                font-size: 16px;
            }
        }
        
        /* Tablet adjustments */
        @media (min-width: 769px) and (max-width: 1024px) {
            .sidebar {
                width: 260px;
            }
            
            .main-content {
                margin-left: 260px;
            }
        }
        
        /* Custom scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Mobile Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo.png') }}" alt="HIPMI Logo">
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.accounts') }}" class="nav-link {{ request()->routeIs('admin.accounts') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        Accounts
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.katalog') }}" class="nav-link {{ request()->routeIs('admin.katalog') ? 'active' : '' }}">
                        <i class="fas fa-folder"></i>
                        Katalog
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.achievers') }}" class="nav-link {{ request()->routeIs('admin.achievers') ? 'active' : '' }}">
                        <i class="fas fa-trophy"></i>
                        Achievers data
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pengurus') }}" class="nav-link {{ request()->routeIs('admin.pengurus') ? 'active' : '' }}">
                        <i class="fas fa-user-tie"></i>
                        Pengurus
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        Setting
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="admin-header">
            <div style="display: flex; align-items: center; gap: 16px;">
                <button class="mobile-menu-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            </div>
            
            <div class="header-actions">
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </button>
                
                <div class="user-profile" onclick="toggleProfileDropdown()">
                    <img src="https://via.placeholder.com/36x36/52FFB6/ffffff?text=A" alt="Admin" class="user-avatar">
                    <div class="user-info">
                        <p class="user-name">Admin</p>
                        <p class="user-role">Administrator</p>
                    </div>
                    <i class="fas fa-chevron-down" style="margin-left: 8px; font-size: 12px; color: #6c757d; transition: transform 0.3s ease;" id="profile-chevron"></i>
                    
                    <!-- Profile Dropdown -->
                    <div class="profile-dropdown" id="profileDropdown">
                        <div class="dropdown-item logout-item" onclick="confirmLogout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log out</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Content Area -->
        <main class="content-area">
            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: linear-gradient(135deg, #2c5530 0%, #52FFB6 100%); border: none; color: white; border-radius: 8px; margin-bottom: 24px;">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @yield('content')
        </main>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }
        
        // Profile dropdown toggle
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            const chevron = document.getElementById('profile-chevron');
            
            dropdown.classList.toggle('show');
            
            if (dropdown.classList.contains('show')) {
                chevron.style.transform = 'rotate(180deg)';
            } else {
                chevron.style.transform = 'rotate(0deg)';
            }
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userProfile = document.querySelector('.user-profile');
            const dropdown = document.getElementById('profileDropdown');
            const chevron = document.getElementById('profile-chevron');
            
            if (!userProfile.contains(event.target)) {
                dropdown.classList.remove('show');
                chevron.style.transform = 'rotate(0deg)';
            }
        });
        
        // Confirm logout
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Create a form and submit it for logout
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('logout') }}";
                
                // Add CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = "{{ csrf_token() }}";
                form.appendChild(csrfToken);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
        
        // File input handling
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('.file-input-custom');
            
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : 'tidak ada file yang dipilih';
                    const fileInfo = this.parentElement.querySelector('.file-info');
                    if (fileInfo) {
                        fileInfo.textContent = fileName;
                    }
                });
            });
            
            // Auto-close sidebar on window resize for mobile
            window.addEventListener('resize', function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });
            
            // Initialize page animations
            initPageAnimations();
        });
        
        // Beautiful page animations
        function initPageAnimations() {
            // Add animate-card class to all cards for staggered animation
            const cards = document.querySelectorAll('.admin-card, .card, .welcome-card');
            cards.forEach((card, index) => {
                if (!card.classList.contains('welcome-card')) {
                    card.classList.add('animate-card');
                    card.style.animationDelay = `${0.1 + (index * 0.1)}s`;
                }
            });
            
            // Add fade-in animation to tables and forms
            const tables = document.querySelectorAll('table, .table');
            const forms = document.querySelectorAll('form');
            
            tables.forEach((table, index) => {
                table.style.animation = `slideUpStagger 0.8s ease-out`;
                table.style.animationDelay = `${0.3 + (index * 0.1)}s`;
                table.style.opacity = '0';
                table.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    table.style.opacity = '1';
                    table.style.transform = 'translateY(0)';
                }, (300 + (index * 100)));
            });
            
            forms.forEach((form, index) => {
                form.style.animation = `slideUpStagger 0.7s ease-out`;
                form.style.animationDelay = `${0.2 + (index * 0.1)}s`;
            });
            
            // Initialize button animations
            initButtonAnimations();
            
            // Check if page came from button click
            checkPageOrigin();
        }
        
        // Initialize button click animations
        function initButtonAnimations() {
            const addButtons = document.querySelectorAll('.btn-add-data, .btn-primary-custom[href*="add"]');
            
            addButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Get button position relative to viewport
                    const rect = this.getBoundingClientRect();
                    const buttonX = rect.left + rect.width / 2;
                    const buttonY = rect.top + rect.height / 2;
                    
                    // Store button position for destination page
                    sessionStorage.setItem('transitionOrigin', JSON.stringify({
                        x: buttonX,
                        y: buttonY,
                        url: this.href,
                        timestamp: Date.now()
                    }));
                    
                    // Add clicked effect
                    this.classList.add('clicked');
                    
                    // Show transition overlay from button position
                    showPageTransition(buttonX, buttonY);
                    
                    // Navigate after animation
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 600);
                });
            });
        }
        
        // Show page transition overlay
        function showPageTransition(buttonX = null, buttonY = null) {
            // Create overlay if doesn't exist
            let overlay = document.getElementById('pageTransitionOverlay');
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.id = 'pageTransitionOverlay';
                overlay.className = 'page-transition-overlay';
                overlay.innerHTML = `
                    <div class="page-transition-content">
                        <div class="page-transition-spinner"></div>
                        <span>Memuat halaman...</span>
                    </div>
                `;
                document.body.appendChild(overlay);
            }
            
            // Set transform origin if button position provided
            if (buttonX !== null && buttonY !== null) {
                const originX = (buttonX / window.innerWidth) * 100;
                const originY = (buttonY / window.innerHeight) * 100;
                overlay.style.transformOrigin = `${originX}% ${originY}%`;
            }
            
            // Show overlay with scale animation from button position
            setTimeout(() => {
                overlay.classList.add('active');
            }, 100);
        }
        
        // Check if page came from button transition
        function checkPageOrigin() {
            const origin = sessionStorage.getItem('transitionOrigin');
            if (origin) {
                const data = JSON.parse(origin);
                
                // Check if transition is recent (within 2 seconds)
                if (Date.now() - data.timestamp < 2000) {
                    // Apply page expansion animation from button position
                    const content = document.querySelector('.content-area');
                    const mainContent = document.querySelector('.main-content');
                    
                    if (content && mainContent) {
                        // Calculate relative position for animation origin
                        const relativeX = (data.x / window.innerWidth) * 100;
                        const relativeY = (data.y / window.innerHeight) * 100;
                        
                        // Apply custom CSS variables for animation origin
                        mainContent.style.setProperty('--button-x', `${relativeX}%`);
                        mainContent.style.setProperty('--button-y', `${relativeY}%`);
                        mainContent.classList.add('page-from-button');
                        
                        // Also apply to content area
                        content.style.setProperty('--button-x', `${relativeX}%`);
                        content.style.setProperty('--button-y', `${relativeY}%`);
                        content.classList.add('page-from-button');
                    }
                }
                
                // Clear stored origin
                sessionStorage.removeItem('transitionOrigin');
                
                // Hide overlay after animation
                setTimeout(() => {
                    const overlay = document.getElementById('pageTransitionOverlay');
                    if (overlay) {
                        overlay.classList.remove('active');
                        setTimeout(() => {
                            overlay.remove();
                        }, 400);
                    }
                }, 200);
            }
        }
        
        // Smooth page transitions
        function smoothPageTransition(url) {
            document.body.style.opacity = '0.8';
            document.body.style.transform = 'translateY(10px)';
            document.body.style.transition = 'all 0.3s ease-out';
            
            setTimeout(() => {
                window.location.href = url;
            }, 300);
        }
    </script>
    
    @yield('scripts')
</body>
</html>
