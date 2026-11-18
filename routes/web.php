<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/status', [AuthController::class, 'checkAuth'])->name('auth.status');

// Admin Portal Routes (Protected by Auth Middleware)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::post('/admin/users/generate-desa', [AdminController::class, 'generateAllVillageAccounts'])->name('admin.users.generate-desa');
    Route::get('/admin/users/export-csv', [AdminController::class, 'exportUsersCSV'])->name('admin.users.export-csv');

    // PODES API Routes
    Route::get('/admin/podes/table-data', [AdminController::class, 'getPodesTableData'])->name('admin.podes.table-data');
    Route::post('/admin/podes/save', [AdminController::class, 'savePodesData'])->name('admin.podes.save');
    Route::post('/admin/podes/sync', [AdminController::class, 'syncPodesFiles'])->name('admin.podes.sync');
    Route::post('/admin/desa/save', [AdminController::class, 'saveDesaMaster'])->name('admin.desa.save');
});

// Dashboard Awal: Tampilan Identik Jejaring Desa Wisata (Jadesta Kemenpar)
Route::get('/', function () {
    return view('jadesta');
});

Route::get('/home', function () {
    return view('jadesta');
});

// Web Utama: Portal Satu Data, WebGIS & Analitik Kemandirian Desa Madani Kolaka Utara
Route::get('/portal', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/se2026', function () {
    return view('dashboard');
});

// Dashboard Menu Utama DESCAN (Desa Cantik - 6 Desa Binaan)
Route::get('/descan', function () {
    return view('desacan');
});

Route::get('/desacan', function () {
    return view('desacan');
});

Route::get('/desa-cantik', function () {
    return view('desacan');
});

// Halaman Login Akun Resmi Desa Cantik (DESCAN)
Route::get('/descan/login', function () {
    return view('desacan-login');
});

Route::get('/login', function () {
    return view('desacan-login');
})->name('login');

Route::get('/desacan/login', function () {
    return view('desacan-login');
});

// Halaman Menu Utama Desa DESCAN (Detail Desa Binaan dengan Multi-Menu)
Route::get('/descan/menu', function () {
    return view('desacan-menu');
});

Route::get('/descan/desa/{slug?}', function () {
    return view('desacan-menu');
});

Route::get('/desacan/menu', function () {
    return view('desacan-menu');
});

Route::get('/desacan/desa/{slug?}', function () {
    return view('desacan-menu');
});


