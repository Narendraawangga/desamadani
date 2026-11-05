<?php

use Illuminate\Support\Facades\Route;

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


