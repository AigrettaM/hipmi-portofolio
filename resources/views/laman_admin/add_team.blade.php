@extends('laman_admin.layout')

@section('title', 'Team - Admin Panel')
@section('page-title', 'Team')

@section('content')
<div class="admin-card">
    <div class="card-header-custom">
        {{ isset($team) ? 'Edit Team' : 'Tambah Data Team' }}
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
        <form action="{{ isset($team) ? route('admin.team.update', $team->id) : route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            @if(isset($team))
                @method('POST')
            @endif
            <div class="form-group mb-3">
                <label for="name" class="form-label-custom">Nama</label>
                <input type="text" id="name" name="name" class="form-control-custom" placeholder="Masukkan nama lengkap" value="{{ old('name', $team->name ?? '') }}">
                @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="position" class="form-label-custom">Jabatan</label>
                <input type="text" id="position" name="position" class="form-control-custom" placeholder="Masukkan jabatan" value="{{ old('position', $team->position ?? '') }}">
                @error('position')
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
                    <span class="file-info">{{ isset($team) && $team->photo_url ? basename($team->photo_url) : 'tidak ada file yang dipilih' }}</span>
                </div>
                @if(isset($team) && $team->photo_url)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $team->photo_url) }}" alt="Foto" style="width: 120px; height: 80px; object-fit: cover; border-radius: 6px;">
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
@endsection
