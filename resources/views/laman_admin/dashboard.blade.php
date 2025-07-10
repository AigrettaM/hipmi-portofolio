@extends('laman_admin.layout')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Overview')

@section('content')
<div class="welcome-card">
    <h2 class="welcome-title">Selamat Datang</h2>
    <p class="welcome-subtitle">Selamat Datang <strong>Administrator</strong> Di Halaman Admin HIPMI PT UPI CIBIRU</p>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-body-custom text-center" style="padding: 60px 24px;">
                <i class="fas fa-chart-line" style="font-size: 48px; color: #2c5530; margin-bottom: 20px;"></i>
                <h4 style="color: #2c5530; margin-bottom: 16px;">Dashboard Overview</h4>
                <p style="color: #6c757d; font-size: 16px; max-width: 500px; margin: 0 auto;">
                    Kelola semua konten website HIPMI PT UPI Cibiru dari panel admin ini. 
                    Gunakan menu navigasi di sebelah kiri untuk mengakses berbagai fitur.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="admin-card">
            <div class="card-body-custom text-center">
                <i class="fas fa-users" style="font-size: 32px; color: #2c5530; margin-bottom: 12px;"></i>
                <h6 style="color: #2c5530; margin-bottom: 8px;">Total Accounts</h6>
                <h4 style="color: #333; margin: 0;">5</h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="admin-card">
            <div class="card-body-custom text-center">
                <i class="fas fa-folder" style="font-size: 32px; color: #2c5530; margin-bottom: 12px;"></i>
                <h6 style="color: #2c5530; margin-bottom: 8px;">Katalog Items</h6>
                <h4 style="color: #333; margin: 0;">12</h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="admin-card">
            <div class="card-body-custom text-center">
                <i class="fas fa-trophy" style="font-size: 32px; color: #2c5530; margin-bottom: 12px;"></i>
                <h6 style="color: #2c5530; margin-bottom: 8px;">Achievers</h6>
                <h4 style="color: #333; margin: 0;">8</h4>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="admin-card">
            <div class="card-body-custom text-center">
                <i class="fas fa-user-tie" style="font-size: 32px; color: #2c5530; margin-bottom: 12px;"></i>
                <h6 style="color: #2c5530; margin-bottom: 8px;">Pengurus</h6>
                <h4 style="color: #333; margin: 0;">15</h4>
            </div>
        </div>
    </div>
</div>
@endsection
