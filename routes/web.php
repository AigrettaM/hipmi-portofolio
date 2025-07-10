<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admins', function () {
    return view('login_admin.adminhipmi');
})->name('admin.login');

Route::post('/logout', function () {
    // Clear any session data if you're using sessions
    // session()->flush();
    // Auth::logout(); // If you're using authentication
    
    return redirect()->route('admin.login')->with('success', 'Anda berhasil logout!');
})->name('logout');

// Admin Routes
Route::prefix('admins')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('laman_admin.dashboard');
    })->name('dashboard');
    
    // Accounts Routes
    Route::get('/accounts', function () {
        return view('laman_admin.account');
    })->name('accounts');
    Route::post('/accounts', function () {
        return redirect()->back()->with('success', 'Data admin berhasil ditambahkan!');
    })->name('accounts.store');
    Route::get('/add-account', function () {
        return view('laman_admin.add_account');
    })->name('add.account');
    
    // Katalog Routes
    Route::get('/katalog', function () {
        return view('laman_admin.katalog');
    })->name('katalog');
    Route::post('/katalog', function () {
        return redirect()->back()->with('success', 'Data katalog berhasil ditambahkan!');
    })->name('katalog.store');
    Route::get('/add-katalog', function () {
        return view('laman_admin.add_katalog');
    })->name('add.katalog');
    // Route::get('/data-katalog', function () {
    //     return view('laman_admin.data_katalog');
    // })->name('data.katalog');
    
    // Achievers Routes
    Route::get('/achievers', function () {
        return view('laman_admin.achievers');
    })->name('achievers');
    Route::post('/achievers', function () {
        return redirect()->back()->with('success', 'Data achievers berhasil ditambahkan!');
    })->name('achievers.store');
    Route::get('/add-achievers', function () {
        return view('laman_admin.add_achievers');
    })->name('add.achievers');
    Route::get('/data-achievers', function () {
        return view('laman_admin.data_achievers');
    })->name('data.achievers');
    
    // Pengurus Routes
    Route::get('/pengurus', function () {
        return view('laman_admin.pengurus');
    })->name('pengurus');
    Route::post('/pengurus', function () {
        return redirect()->back()->with('success', 'Data pengurus berhasil ditambahkan!');
    })->name('pengurus.store');
    Route::get('/add-pengurus', function () {
        return view('laman_admin.add_pengurus');
    })->name('add.pengurus');
    Route::get('/data-pengurus', function () {
        return view('laman_admin.data_pengurus');
    })->name('data.pengurus');
});
