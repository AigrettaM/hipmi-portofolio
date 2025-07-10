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
                        <th style="width: 80px;">foto</th>
                        <th>judul</th>
                        <th>Deskripsi</th>
                        <th>Link</th>
                        <th>Kategori</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                <i class="fas fa-user" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                        </td>
                        <td>judul</td>
                        <td>deskripsi</td>
                        <td>http</td>
                        <td>bootcamp</td>
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
                        <td>
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                <i class="fas fa-image" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                        </td>
                        <td>Workshop Digital Marketing</td>
                        <td>Pelatihan digital marketing untuk UMKM</td>
                        <td>https://workshop.hipmi.com</td>
                        <td>Workshop</td>
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
                        <td>
                            <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background-color: #e9ecef; border-radius: 6px;">
                                <i class="fas fa-file-alt" style="color: #6c757d; font-size: 18px;"></i>
                            </div>
                        </td>
                        <td>Seminar Kewirausahaan</td>
                        <td>Seminar tentang jiwa kewirausahaan muda</td>
                        <td>https://seminar.hipmi.id</td>
                        <td>Seminar</td>
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
