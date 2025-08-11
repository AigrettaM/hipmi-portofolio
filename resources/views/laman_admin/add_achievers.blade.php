@extends('laman_admin.layout')

@section('title', 'Achievers Data - Admin Panel')
@section('page-title', 'Achievers data')

@section('content')
<div class="admin-card">
    <div class="card-header-custom">
        {{ isset($achiever) ? 'Edit Achiever' : 'Tambah Achievers data' }}
    </div>
    <div class="card-body-custom">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ isset($achiever) ? route('admin.achievers.update', $achiever->id) : route('admin.achievers.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @if(isset($achiever))
                @method('POST')
            @endif
            <div class="form-group mb-3">
                <label for="foto" class="form-label-custom">Foto</label>
                <div class="file-input-wrapper">
                    <input type="file" id="foto" name="foto" class="file-input-custom" accept="image/*">
                    <label for="foto" class="file-input-label">
                        <i class="fas fa-upload me-2"></i>Pilih File
                    </label>
                    <span class="file-info">{{ isset($achiever) && $achiever->photo_url ? basename($achiever->photo_url) : 'tidak ada file yang dipilih' }}</span>
                </div>
                @if(isset($achiever) && $achiever->photo_url)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $achiever->photo_url) }}" alt="Foto" style="width: 120px; height: 80px; object-fit: cover; border-radius: 6px;">
                    </div>
                @endif
                @error('foto')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
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
{{-- No JS needed for form submit, handled by backend --}}
@endsection
