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
use App\Http\Controllers\FieldController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ScheduleController;



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
        $orders = \App\Models\Order::where('user_id', auth()->id())
            ->where('status', '!=', 'pending')
            ->whereDate('tanggal', '>=', \Carbon\Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->count();
        return view('pelanggan.dashboard', compact('orders'));
    })->name('pelanggan.dashboard');

    Route::get('/pelanggan/akun', [ProfileController::class, 'edit'])->name('pelanggan.akun');
});

Route::middleware(['auth', CheckRole::class . ':pemilik'])->group(function () {
    Route::get('/pemilik/dashboard', function () {
        $pendingCount = \App\Models\Order::where('status', 'pending')->count();
        return view('pemilik.dashboard', compact('pendingCount'));
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


// ============================
Route::middleware(['auth'])->group(function () {
    Route::resource('fields', FieldController::class); // fields.index ini yang dipanggil

    Route::get('pemilik/lapangan/{lapanganId}/detail/{tanggal}', [FieldController::class, 'detailLapangan'])->name('pemilik.lapangan.detail');

    Route::get('pelanggan/pesan', [OrderController::class, 'index'])->name('pelanggan.fields.index');
    Route::get('pelanggan/pesan/create', [OrderController::class, 'create']);
    Route::post('pelanggan/pesan/store', [OrderController::class, 'store']);
    Route::get('pelanggan/pesan/data', [OrderController::class, 'data_order'])->name('pelanggan.fields.data');


    Route::get('pemilik/pesan/data', [OrderController::class, 'owner_data_order'])->name('pemilik.orders.data');
    Route::put('pemilik/pesan/data/{order_unique_id}', [OrderController::class, 'updateStatus'])->name('pemilik.orders.updateStatus');


});


