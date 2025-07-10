@extends('laman_admin.layout')

@section('title', 'Pengurus - Admin Panel')
@section('page-title', 'Pengurus')

@section('content')
<div class="admin-card">
    <div class="card-header-custom">
        Tambah Data Pengurus
    </div>
    <div class="card-body-custom">
        <form action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data" id="pengurusForm" class="form-container">
            @csrf
            
            <div class="form-group">
                <label for="nama" class="form-label-custom">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control-custom" placeholder="Masukkan nama lengkap">
            </div>
            
            <div class="form-group">
                <label for="jabatan" class="form-label-custom">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-control-custom" placeholder="Masukkan jabatan">
            </div>
            
            <div class="form-group">
                <label for="link" class="form-label-custom">Link</label>
                <input type="url" id="link" name="link" class="form-control-custom" placeholder="https://example.com">
            </div>
            
            <div class="form-group">
                <label for="foto" class="form-label-custom">Foto</label>
                <div class="file-input-wrapper">
                    <input type="file" id="foto" name="foto" class="file-input-custom" accept="image/*">
                    <label for="foto" class="file-input-label">
                        <i class="fas fa-upload me-2"></i>Pilih File
                    </label>
                    <span class="file-info">tidak ada file yang dipilih</span>
                </div>
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
<!-- <div class="admin-card mt-4">
    <div class="card-header-custom">
        Data Pengurus
    </div>
    <div class="card-body-custom">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th style="width: 80px;">Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Link</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="https://via.placeholder.com/60x60/2c5530/ffffff?text=KH" 
                                 alt="Ketua" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><strong>Ahmad Rizki Maulana</strong></td>
                        <td>
                            <span class="badge bg-primary">Ketua Umum</span>
                        </td>
                        <td>
                            <a href="#" class="text-decoration-none" target="_blank">
                                <i class="fas fa-external-link-alt me-1"></i>LinkedIn
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <img src="https://via.placeholder.com/60x60/52FFB6/ffffff?text=WK" 
                                 alt="Wakil" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><strong>Siti Nurhaliza</strong></td>
                        <td>
                            <span class="badge bg-success">Wakil Ketua</span>
                        </td>
                        <td>
                            <a href="#" class="text-decoration-none" target="_blank">
                                <i class="fas fa-external-link-alt me-1"></i>Instagram
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <img src="https://via.placeholder.com/60x60/f4ca4c/ffffff?text=SK" 
                                 alt="Sekretaris" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><strong>Muhammad Fajar</strong></td>
                        <td>
                            <span class="badge bg-info">Sekretaris</span>
                        </td>
                        <td>
                            <a href="#" class="text-decoration-none" target="_blank">
                                <i class="fas fa-external-link-alt me-1"></i>Twitter
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <img src="https://via.placeholder.com/60x60/dc3545/ffffff?text=BH" 
                                 alt="Bendahara" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><strong>Dewi Sartika</strong></td>
                        <td>
                            <span class="badge bg-warning">Bendahara</span>
                        </td>
                        <td>
                            <a href="#" class="text-decoration-none" target="_blank">
                                <i class="fas fa-external-link-alt me-1"></i>Website
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->
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
document.getElementById('pengurusForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Tampilkan notifikasi sukses
    showSuccessNotification();
    
    // Auto redirect ke halaman pengurus setelah 3 detik
    setTimeout(function() {
        window.location.href = "{{ route('admin.pengurus') }}";
    }, 3000);
});

function showSuccessNotification() {
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
                    <small>Data pengurus berhasil ditambahkan. Akan redirect dalam <span id="countdown">3</span> detik...</small>
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
