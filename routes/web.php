<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('beranda');
});





Route::middleware(['auth', CheckRole::class . ':pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', function () {
        return view('pelanggan.dashboard');
    })->name('pelanggan.dashboard');
});

Route::middleware(['auth', CheckRole::class . ':pemilik'])->group(function () {
    Route::get('/pemilik/dashboard', function () {
        return view('pemilik.dashboard');
    })->name('pemilik.dashboard');
});


