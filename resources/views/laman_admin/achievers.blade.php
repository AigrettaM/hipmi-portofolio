@extends('laman_admin.layout')

@section('title', 'Data Achievers - Admin Panel')
@section('page-title', 'Achievers data')

@section('content')
<div class="admin-card">
    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span>Data Achievers data</span>
        <a href="{{ route('admin.add.achievers') }}" class="btn-primary-custom btn-add-data">
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
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($achievers as $index => $achiever)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($achiever->photo_url)
                                <img src="{{ asset('storage/' . $achiever->photo_url) }}" alt="Foto" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;">
                            @else
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                <i class="fas fa-user" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.achievers.edit', $achiever->id) }}" class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">Edit</a>
                            <form action="{{ route('admin.achievers.destroy', $achiever->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data achievers.</td>
                    </tr>
                    @endforelse
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
