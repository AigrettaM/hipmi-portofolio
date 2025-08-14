@extends('laman_admin.layout')

@section('title', 'Data Team - Admin Panel')
@section('page-title', 'Team')

@section('content')
<div class="admin-card">
    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span>Data Team</span>
        <a href="{{ route('admin.add.team') }}" class="btn-primary-custom btn-add-data">
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th style="width: 80px;">Foto</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $index => $team)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->position }}</td>
                            <td>
                                @if($team->photo_url)
                                    <img src="{{ asset('storage/' . $team->photo_url) }}" alt="Foto" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background-color: #e9ecef; border-radius: 50%;">
                                        <i class="fas fa-user" style="color: #6c757d; font-size: 18px;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data team.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
