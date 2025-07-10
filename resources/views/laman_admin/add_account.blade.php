@extends('laman_admin.layout')

@section('title', 'Accounts - Admin Panel')
@section('page-title', 'Accounts')

@section('content')
<div class="admin-card">
    <div class="card-header-custom">
        Tambah Data Admin
    </div>
    <div class="card-body-custom">
        <form action="{{ route('admin.accounts.store') }}" method="POST" id="accountForm" class="form-container">
            @csrf
            
            <div class="form-group">
                <label for="nama" class="form-label-custom">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control-custom" placeholder="Masukkan nama lengkap">
            </div>
            
            <div class="form-group">
                <label for="username" class="form-label-custom">Username</label>
                <input type="text" id="username" name="username" class="form-control-custom" placeholder="Masukkan username">
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label-custom">Password</label>
                <input type="password" id="password" name="password" class="form-control-custom" placeholder="Masukkan password">
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn-primary-custom">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Data Table -->
<div class="admin-card mt-4">
    <!-- <div class="card-header-custom">
        Data Admin
    </div> -->
    <!-- <div class="card-body-custom">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data admin akan ditampilkan di sini -->
                </tbody>
            </table>
        </div>
    </div> -->
</div>
@endsection

@section('styles')
<style>
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        font-size: 14px;
        color: #2c5530;
        border-bottom: 2px solid #e9ecef;
        padding: 12px;
    }
    
    .table td {
        padding: 12px;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .badge {
        font-size: 11px;
        padding: 4px 8px;
    }
    
    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
    }
</style>
@endsection

@section('scripts')
<script>
document.getElementById('accountForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simulasi pengiriman data (karena statis)
    // Di implementasi nyata, Anda bisa menggunakan AJAX untuk submit form
    
    // Tampilkan notifikasi sukses
    showSuccessNotification();
    
    // Auto redirect ke halaman accounts setelah 3 detik
    setTimeout(function() {
        window.location.href = "{{ route('admin.accounts') }}";
    }, 3000);
});

function showSuccessNotification() {
    // Buat elemen notifikasi
    const notification = document.createElement('div');
    notification.innerHTML = `
        <div class="alert alert-success" style="
            position: fixed; 
            top: 20px; 
            right: 20px; 
            z-index: 9999; 
            min-width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            font-weight: 600;
        ">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2" style="font-size: 18px;"></i>
                <div>
                    <strong>Berhasil!</strong><br>
                    <small>Data admin berhasil ditambahkan. Akan redirect dalam <span id="countdown">3</span> detik...</small>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Countdown timer
    let countdown = 3;
    const countdownElement = document.getElementById('countdown');
    const countdownInterval = setInterval(function() {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown <= 0) {
            clearInterval(countdownInterval);
        }
    }, 1000);
    
    // Hapus notifikasi setelah 3.5 detik
    setTimeout(function() {
        if (notification.parentNode) {
            notification.parentNode.removeChild(notification);
        }
    }, 3500);
}
</script>
