<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Rute Halaman Utama (Langsung diarahkan ke page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Detail food
Route::get('/food/{food}', [HomeController::class, 'showFoodDetail'])->name('food.detail');

// Rute Detail Paket
Route::get('/paket/{paket}', [HomeController::class, 'showPaketDetail'])->name('paket.detail');

// Rute Admin Panel (dari Filament)
// Jangan ubah ini jika Anda menggunakan Filament secara default
// Route::get('/admin', function () {
//     // Ini akan otomatis ditangani oleh Filament
// })->name('filament.admin.auth.login'); // Nama rute login admin