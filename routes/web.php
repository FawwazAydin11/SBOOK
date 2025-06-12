<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\RedirectIfAuthenticatedByRole;
use App\Http\Middleware\PreventBackHistory;

/*
|--------------------------------------------------------------------------
| Halaman Landing (disable cache agar tidak nyangkut)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Response::nocache(view('beranda'));
});

/*
|--------------------------------------------------------------------------
| Auth: Login & Register (Guest Only, disable cache)
|--------------------------------------------------------------------------
*/
Route::middleware([RedirectIfAuthenticatedByRole::class])->group(function () {
    Route::get('/login', fn () => Response::nocache(
        app(AuthenticatedSessionController::class)->create()
    ))->name('login');

    Route::get('/register', fn () => Response::nocache(
        app(RegisteredUserController::class)->create()
    ))->name('register');
});


Route::middleware([PreventBackHistory::class])->group(function () {
    Route::get('/', function () {
        return view('beranda');
    });

    Route::middleware([RedirectIfAuthenticatedByRole::class])->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    });
});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect Handler (hindari /dashboard kosong)
|--------------------------------------------------------------------------
*/
Route::redirect('/dashboard', '/'); // Redirect jika /dashboard diakses langsung

/*
|--------------------------------------------------------------------------
| Dashboard Role-Based
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', CheckRole::class . ':pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', function () {
        return view('pelanggan.dashboard');
    })->name('pelanggan.dashboard');

    Route::get('/pelanggan/akun', [ProfileController::class, 'edit'])->name('pelanggan.akun');
});

Route::middleware(['auth', CheckRole::class . ':pemilik'])->group(function () {
    Route::get('/pemilik/dashboard', function () {
        return view('pemilik.dashboard');
    })->name('pemilik.dashboard');
});

/*
|--------------------------------------------------------------------------
| Profil Pengguna
|--------------------------------------------------------------------------
*/

// =================================================================
Route::middleware('auth')->group(function () {
    Route::get('/akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/akun', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/akun', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Opsional
});



/*
|--------------------------------------------------------------------------
| Auth Routes Default (Logout dll)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
