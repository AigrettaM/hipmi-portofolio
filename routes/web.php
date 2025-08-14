<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact - HIMPI Portofolio'
    ]);
})->name('contact');

Route::get('/hipmi', function () {
    return view('hipmi');
})->name('hipmi');

// Info Routes
Route::prefix('info')->name('info.')->group(function () {
    Route::get('/achievers', [InfoController::class, 'achievers'])->name('achievers');
    Route::get('/scholarship', [InfoController::class, 'scholarship'])->name('scholarship');
    Route::get('/bootcamp', [InfoController::class, 'bootcamp'])->name('bootcamp');
    Route::get('/artikel/{id}', [InfoController::class, 'artikelDetail'])->name('artikel.detail');
});

// Admin Authentication Routes
Route::get('/admins', function () {
    return view('login_admin.adminhipmi');
})->name('admin.login');

Route::post('/admins/login', function (Illuminate\Http\Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    
    // Simple role-based authentication
    $userRole = 'regular_admin'; // Default role
    
    if (strtolower($username) === 'superadmin' && $password === 'superadmin123') {
        $userRole = 'super_admin';
    } elseif (strtolower($username) === 'admin' && $password === 'admin123') {
        $userRole = 'regular_admin';
    } else {
        return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
    }
    
    // Store user info in session
    session([
        'admin_role' => $userRole,
        'admin_username' => $username,
        'is_logged_in' => true
    ]);
    
    return redirect()->route('admin.dashboard');
})->name('admin.login.post');

Route::post('/logout', function () {
    session()->flush();
    return redirect()->route('admin.login')->with('success', 'Anda berhasil logout!');
})->name('logout');

// Admin Routes
Route::prefix('admins')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('laman_admin.dashboard');
    })->name('dashboard');

    // Accounts Routes - Only Super Admin can access
    Route::middleware(['super.admin'])->group(function () {
        Route::get('/accounts', function () {
            return view('laman_admin.account');
        })->name('accounts');
        
        Route::post('/accounts', function () {
            return redirect()->back()->with('success', 'Data admin berhasil ditambahkan!');
        })->name('accounts.store');
        
        Route::get('/add-account', function () {
            return view('laman_admin.add_account');
        })->name('add.account');
    });

    // Katalog Routes
    Route::get('/katalog', [\App\Http\Controllers\KatalogController::class, 'index'])->name('katalog');
    Route::get('/add-katalog', [\App\Http\Controllers\KatalogController::class, 'create'])->name('add.katalog');
    Route::post('/katalog', [\App\Http\Controllers\KatalogController::class, 'store'])->name('katalog.store');
    Route::get('/katalog/{kategori}/{id}/edit', [\App\Http\Controllers\KatalogController::class, 'edit'])->name('katalog.edit');
    Route::post('/katalog/{kategori}/{id}/update', [\App\Http\Controllers\KatalogController::class, 'update'])->name('katalog.update');
    Route::delete('/katalog/{kategori}/{id}', [\App\Http\Controllers\KatalogController::class, 'destroy'])->name('katalog.destroy');

    // Achievers Routes
    Route::get('/achievers', [\App\Http\Controllers\AchieverController::class, 'index'])->name('achievers');
    Route::get('/add-achievers', [\App\Http\Controllers\AchieverController::class, 'create'])->name('add.achievers');
    Route::post('/achievers', [\App\Http\Controllers\AchieverController::class, 'store'])->name('achievers.store');
    Route::get('/achievers/{id}/edit', [\App\Http\Controllers\AchieverController::class, 'edit'])->name('achievers.edit');
    Route::post('/achievers/{id}/update', [\App\Http\Controllers\AchieverController::class, 'update'])->name('achievers.update');
    Route::delete('/achievers/{id}', [\App\Http\Controllers\AchieverController::class, 'destroy'])->name('achievers.destroy');

    // Team Routes
    Route::get('/team', [\App\Http\Controllers\TeamController::class, 'index'])->name('team');
    Route::get('/add-team', [\App\Http\Controllers\TeamController::class, 'create'])->name('add.team');
    Route::post('/team', [\App\Http\Controllers\TeamController::class, 'store'])->name('team.store');
    Route::get('/team/{id}/edit', [\App\Http\Controllers\TeamController::class, 'edit'])->name('team.edit');
    Route::post('/team/{id}/update', [\App\Http\Controllers\TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [\App\Http\Controllers\TeamController::class, 'destroy'])->name('team.destroy');
});

