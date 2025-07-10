@extends('laman_admin.layout')

@section('title', 'Katalog - Admin Panel')
@section('page-title', 'Katalog')

@section('content')
<div class="admin-card">
    <div class="card-header-custom">
        Tambah Data Katalog
    </div>
    <div class="card-body-custom">
        <form action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data" id="katalogForm" class="form-container">
            @csrf
            
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
            
            <div class="form-group">
                <label for="judul" class="form-label-custom">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control-custom" placeholder="Masukkan judul katalog">
            </div>
            
            <div class="form-group">
                <label for="deskripsi" class="form-label-custom">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control-custom" rows="4" placeholder="Masukkan deskripsi katalog"></textarea>
            </div>
            
            <div class="form-group">
                <label for="link" class="form-label-custom">Link</label>
                <input type="url" id="link" name="link" class="form-control-custom" placeholder="https://example.com">
            </div>
            
            <div class="form-group">
                <label for="kategori" class="form-label-custom">Kategori</label>
                <div class="position-relative">
                    <select id="kategori" name="kategori" class="form-control-custom">
                        <option value="">Pilih kategori</option>
                        <option value="scholarship">Scholarship</option>
                        <option value="boothcamp">Boothcamp</option>
                        <option value="artikel">Artikel</option>
                    </select>
                    <i class="fas fa-chevron-down position-absolute" style="right: 12px; top: 50%; transform: translateY(-50%); color: #6c757d; pointer-events: none;"></i>
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
        Data Katalog
    </div>
    <div class="card-body-custom">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th style="width: 100px;">Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="https://via.placeholder.com/60x40/2c5530/ffffff?text=IMG" 
                                 alt="Katalog" class="img-thumbnail" style="width: 60px; height: 40px; object-fit: cover;">
                        </td>
                        <td>Contoh Katalog 1</td>
                        <td>Deskripsi contoh katalog pertama...</td>
                        <td><span class="badge bg-primary">Teknologi</span></td>
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
                            <img src="https://via.placeholder.com/60x40/2c5530/ffffff?text=IMG" 
                                 alt="Katalog" class="img-thumbnail" style="width: 60px; height: 40px; object-fit: cover;">
                        </td>
                        <td>Contoh Katalog 2</td>
                        <td>Deskripsi contoh katalog kedua...</td>
                        <td><span class="badge bg-success">Bisnis</span></td>
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
    
    select.form-control-custom {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: none;
        padding-right: 40px;
    }
</style>
@endsection

@section('scripts')
<script>
document.getElementById('katalogForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Tampilkan notifikasi sukses
    showSuccessNotification();
    
    // Auto redirect ke halaman katalog setelah 3 detik
    setTimeout(function() {
        window.location.href = "{{ route('admin.katalog') }}";
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
                    <small>Data katalog berhasil ditambahkan. Akan redirect dalam <span id="countdown">3</span> detik...</small>
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
