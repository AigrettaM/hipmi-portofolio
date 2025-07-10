@extends('laman_admin.layout')

@section('title', 'Data User - Admin Panel')
@section('page-title', 'Accounts')

@section('content')
<div class="admin-card">
    <div class="card-header-custom d-flex justify-content-between align-items-center">
        <span>Data User</span>
        <a href="{{ route('admin.add.account') }}" class="btn-primary-custom btn-add-data">
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
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Ibnu</td>
                        <td>ibnuhu</td>
                        <td>yustyut</td>
                        <td>
                            <span class="badge bg-success px-3 py-2" style="font-size: 12px; font-weight: 600;">Aktif</span>
                        </td>
                        <td>
                            <button class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                                Edit
                            </button>
                            <button class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Sarah Indira</td>
                        <td>sarahind</td>
                        <td>admin123</td>
                        <td>
                            <span class="badge bg-success px-3 py-2" style="font-size: 12px; font-weight: 600;">Aktif</span>
                        </td>
                        <td>
                            <button class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                                Edit
                            </button>
                            <button class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Andi Pratama</td>
                        <td>andipt</td>
                        <td>secure456</td>
                        <td>
                            <span class="badge bg-warning px-3 py-2" style="font-size: 12px; font-weight: 600; color: white;">Pending</span>
                        </td>
                        <td>
                            <button class="btn btn-sm px-3 py-2 me-2" style="background-color: #ffc107; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                                Edit
                            </button>
                            <button class="btn btn-sm px-3 py-2" style="background-color: #dc3545; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                                Hapus
                            </button>
                        </td>
                    </tr>
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
    
    .badge {
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 6px;
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
