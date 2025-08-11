@extends('laman_admin.layout')

@section('title', 'Katalog - Admin Panel')
@section('page-title', 'Katalog')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="admin-card">
    <div class="card-header-custom">
        {{ isset($item) ? 'Edit Katalog' : 'Tambah Data Katalog' }}
    </div>
    <div class="card-body-custom">
        <form action="{{ isset($item) ? route('admin.katalog.update', [$item->kategori, $item->id]) : route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @if(isset($item))
                @method('POST')
            @endif
            
            <div class="form-group mb-3">
                <label for="judul" class="form-label-custom">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control-custom" placeholder="Masukkan judul katalog" value="{{ old('judul', $item->title ?? '') }}">
                @error('judul')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="deskripsi" class="form-label-custom">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control-custom" rows="4" placeholder="Masukkan deskripsi katalog">{{ old('deskripsi', $item->description ?? '') }}</textarea>
                @error('deskripsi')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="link" class="form-label-custom">Link</label>
                <input type="url" id="link" name="link" class="form-control-custom" placeholder="https://example.com" value="{{ old('link', $item->link ?? '') }}">
                @error('link')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="kategori" class="form-label-custom">Kategori</label>
                <div class="position-relative">
                    <select id="kategori" name="kategori" class="form-control-custom">
                        <option value="">Pilih kategori</option>
                        <option value="scholarship" {{ old('kategori', $item->kategori ?? '') == 'scholarship' ? 'selected' : '' }}>Scholarship</option>
                        <option value="bootcamp" {{ old('kategori', $item->kategori ?? '') == 'bootcamp' ? 'selected' : '' }}>Bootcamp</option>
                        <option value="article" {{ old('kategori', $item->kategori ?? '') == 'article' ? 'selected' : '' }}>Article</option>
                    </select>
                    <i class="fas fa-chevron-down position-absolute" style="right: 12px; top: 50%; transform: translateY(-50%); color: #6c757d; pointer-events: none;"></i>
                </div>
                @error('kategori')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="foto" class="form-label-custom">Foto</label>
                <div class="file-input-wrapper">
                    <input type="file" id="foto" name="foto" class="file-input-custom" accept="image/*">
                    <label for="foto" class="file-input-label">
                        <i class="fas fa-upload me-2"></i>Pilih File
                    </label>
                    <span class="file-info">{{ isset($item) && $item->image_url ? basename($item->image_url) : 'tidak ada file yang dipilih' }}</span>
                </div>
                @if(isset($item) && $item->image_url)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $item->image_url) }}" alt="Foto" style="width: 120px; height: 80px; object-fit: cover; border-radius: 6px;">
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
document.getElementById('kategori').addEventListener('change', function() {
    const dateField = document.getElementById('dateField');
    if (this.value === 'bootcamp') {
        dateField.style.display = 'block';
    } else {
        dateField.style.display = 'none';
    }
});

// Show date field on page load if kategori is bootcamp
document.addEventListener('DOMContentLoaded', function() {
    const kategoriSelect = document.getElementById('kategori');
    const dateField = document.getElementById('dateField');
    if (kategoriSelect.value === 'bootcamp') {
        dateField.style.display = 'block';
    }
});
</script>
@endsection
