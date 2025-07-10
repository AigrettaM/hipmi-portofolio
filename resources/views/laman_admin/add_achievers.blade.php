@extends('laman_admin.layout')

@section('title', 'Achievers Data - Admin Panel')
@section('page-title', 'Achievers data')

@section('content')
<div class="admin-card">
    <div class="card-header-custom">
        Tambah Achievers data
    </div>
    <div class="card-body-custom">
        <form action="{{ route('admin.achievers.store') }}" method="POST" enctype="multipart/form-data" id="achieversForm" class="form-container">
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
        Data Achievers
    </div>
    <div class="card-body-custom">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th style="width: 150px;">Foto</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="https://via.placeholder.com/120x80/2c5530/ffffff?text=ACHIEVEMENT" 
                                 alt="Achievement" class="img-thumbnail" style="width: 120px; height: 80px; object-fit: cover;">
                        </td>
                        <td>
                            <strong>Juara 1 Kompetisi Bisnis Nasional 2024</strong><br>
                            <span class="text-muted">Tim HIPMI PT UPI Cibiru berhasil meraih juara pertama dalam kompetisi bisnis tingkat nasional dengan inovasi teknologi terdepan.</span>
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
                            <img src="https://via.placeholder.com/120x80/2c5530/ffffff?text=AWARD" 
                                 alt="Award" class="img-thumbnail" style="width: 120px; height: 80px; object-fit: cover;">
                        </td>
                        <td>
                            <strong>Penghargaan Organisasi Mahasiswa Terbaik</strong><br>
                            <span class="text-muted">HIPMI PT UPI Cibiru mendapat pengakuan sebagai organisasi mahasiswa terbaik se-Jawa Barat dengan berbagai program inovatif.</span>
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
                            <img src="https://via.placeholder.com/120x80/2c5530/ffffff?text=TROPHY" 
                                 alt="Trophy" class="img-thumbnail" style="width: 120px; height: 80px; object-fit: cover;">
                        </td>
                        <td>
                            <strong>Prestasi Kewirausahaan Muda Terbaik</strong><br>
                            <span class="text-muted">Anggota HIPMI berhasil meraih penghargaan wirausaha muda terbaik dengan startup yang berdampak sosial positif.</span>
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
    
    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
    }
    
    .text-muted {
        font-size: 13px;
        line-height: 1.4;
    }
</style>
@endsection

@section('scripts')
<script>
document.getElementById('achieversForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Tampilkan notifikasi sukses
    showSuccessNotification();
    
    // Auto redirect ke halaman achievers setelah 3 detik
    setTimeout(function() {
        window.location.href = "{{ route('admin.achievers') }}";
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
                    <small>Data achievers berhasil ditambahkan. Akan redirect dalam <span id="countdown">3</span> detik...</small>
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
