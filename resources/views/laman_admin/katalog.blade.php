@extends('laman_admin.layout')

@section('title', 'Data Katalog - Admin Panel')
@section('page-title', 'Katalog')

@section('content')
<div class="admin-card">
    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span>Data Katalog</span>
        <a href="{{ route('admin.add.katalog') }}" class="btn-primary-custom btn-add-data">
            <i class="fas fa-plus"></i>
            Tambah Data
        </a>
    </div>
    <div class="card-body-custom">
        <div class="table-responsive table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 80px;">Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Link</th>
                        <th>Kategori</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    
                    {{-- Scholarships --}}
                    @foreach($scholarships as $scholarship)
                    <tr>
                            <td>{{ $no++ }}</td>
                        <td>
                                @if($scholarship->image_url)
                                    <img src="{{ asset('storage/' . $scholarship->image_url) }}" alt="Foto" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;">
                                @else
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                        <i class="fas fa-graduation-cap" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                                @endif
                        </td>
                            <td>{{ $scholarship->title }}</td>
                            <td>{{ Str::limit($scholarship->description, 50) }}</td>
                            <td>{{ Str::limit($scholarship->link, 30) }}</td>
                            <td><span class="badge bg-primary">Scholarship</span></td>
                            <td>
                                <a href="{{ route('admin.katalog.edit', ['scholarship', $scholarship->id]) }}" class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.katalog.destroy', ['scholarship', $scholarship->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    {{-- Bootcamps --}}
                    @foreach($bootcamps as $bootcamp)
                    <tr>
                            <td>{{ $no++ }}</td>
                        <td>
                                @if($bootcamp->image_url)
                                    <img src="{{ asset('storage/' . $bootcamp->image_url) }}" alt="Foto" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;">
                                @else
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                        <i class="fas fa-laptop-code" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                                @endif
                        </td>
                            <td>{{ $bootcamp->title }}</td>
                            <td>{{ Str::limit($bootcamp->description, 50) }}</td>
                            <td>{{ Str::limit($bootcamp->link, 30) }}</td>
                            <td><span class="badge bg-success">Bootcamp</span></td>
                            <td>
                                <a href="{{ route('admin.katalog.edit', ['bootcamp', $bootcamp->id]) }}" class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.katalog.destroy', ['bootcamp', $bootcamp->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    {{-- Articles --}}
                    @foreach($articles as $article)
                    <tr>
                            <td>{{ $no++ }}</td>
                        <td>
                                @if($article->thumbnail)
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Foto" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;">
                                @else
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                        <i class="fas fa-newspaper" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                                @endif
                        </td>
                            <td>{{ $article->title }}</td>
                            <td>{{ Str::limit($article->content, 50) }}</td>
                            <td>-</td>
                            <td><span class="badge bg-info">Article</span></td>
                            <td>
                                <a href="{{ route('admin.katalog.edit', ['article', $article->id]) }}" class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.katalog.destroy', ['article', $article->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if($scholarships->count() == 0 && $bootcamps->count() == 0 && $articles->count() == 0)
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data katalog.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
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
        padding: 16px 12px;
    }
    
    .table td {
        padding: 16px 12px;
        vertical-align: middle;
        font-size: 14px;
        font-weight: 500;
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 6px;
    }
    
    .card-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
@endsection
