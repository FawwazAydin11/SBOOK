@extends('layouts.layout-pelanggan')

@section('title', 'Akun Saya')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-danger">Edit Profil</h2>

    {{-- Form Utama untuk Update Profil --}}
    <form action="{{ route('profile.update') }}" method="POST" id="profileForm" novalidate>
        @csrf
        @method('PATCH')

        <!-- Nama -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name', auth()->user()->name) }}" required pattern="^[A-Za-z\s]+$">
            @error('name')
                <div class="text-danger small">
                    {{ $message === 'The name field is required.' ? 'Data harus diisi' : 'Format harus sesuai' }}
                </div>
            @enderror
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="{{ old('username', auth()->user()->username) }}" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$">
            @error('username')
                <div class="text-danger small">
                    {{ $message === 'The username field is required.' ? 'Data harus diisi' : 'Format harus sesuai' }}
                </div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                value="{{ old('email', auth()->user()->email) }}" required>
            @error('email')
                <div class="text-danger small">
                    {{ $message === 'The email field is required.' ? 'Data harus diisi' : 'Format harus sesuai' }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">Password (biarkan kosong jika tidak diubah)</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="••••••••">
                <span class="input-group-text">
                    <i class="fas fa-eye-slash toggle-password" data-target="password" style="cursor:pointer;"></i>
                </span>
            </div>
        </div>

    </form>

    {{-- Tombol Logout dan Simpan Perubahan sejajar --}}
    <div class="d-flex justify-content-between mt-3 gap-3">
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>

        <button type="submit" id="submitBtn" form="profileForm" class="btn btn-danger" disabled>
            Simpan Perubahan
        </button>
    </div>
</div>

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JS Toggle Password & Enable Button -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('profileForm');
        const inputs = form.querySelectorAll('input');
        const submitBtn = document.getElementById('submitBtn');
        const initial = {};

        inputs.forEach(input => initial[input.name] = input.value);

        form.addEventListener('input', () => {
            let changed = false;
            inputs.forEach(input => {
                if (input.name && input.value !== initial[input.name]) {
                    changed = true;
                }
            });
            submitBtn.disabled = !changed;
        });

        // Toggle Password Visibility
        const toggleIcons = document.querySelectorAll('.toggle-password');
        toggleIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>

<!-- SweetAlert Success -->
@if (session('status') === 'profile-updated' || session('status') === 'Profil berhasil diperbarui')
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Profil berhasil diperbarui.',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endsection
