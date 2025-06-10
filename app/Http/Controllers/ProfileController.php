<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil pengguna.
     */
    public function edit(Request $request): View
    {
        $role = $request->user()->role;

        if ($role === 'pelanggan') {
            return view('pelanggan.akun');
        } elseif ($role === 'pemilik') {
            return view('pemilik.akun');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Perbarui data profil pengguna.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['bail', 'required', 'regex:/^[A-Za-z\s]+$/'],
            'username' => ['bail', 'required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/', 'unique:users,username,' . $user->id],
            'email' => ['bail', 'required', 'email', 'unique:users,email,' . $user->id],
        ], [
            'required' => 'Data harus diisi',
            'regex' => 'Format harus sesuai',
            'email' => 'Format harus sesuai',
        ]);

        $user->update($validated);

        return Redirect::route('profile.edit')->with('status', 'Profil berhasil diperbarui');
    }


    /**
     * Hapus akun pengguna.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
