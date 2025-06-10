<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Tangani proses autentikasi pengguna.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validasi & login diproses oleh LoginRequest
        $request->authenticate();

        // Amankan session
        $request->session()->regenerate();

        $user = Auth::user();

        return match ($user->role) {
            'pemilik' => redirect()->route('pemilik.dashboard'),
            'pelanggan' => redirect()->route('pelanggan.dashboard'),
            default => redirect('/'),
        };
    }

    /**
     * Logout dan akhiri session pengguna.
     */
    public function destroy(\Illuminate\Http\Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
