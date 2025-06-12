@extends('layouts.layout-pemilik')

@section('title', 'Akun Saya')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded-4 overflow-hidden">
        <!-- Header -->
        <div class="bg-danger text-white p-3 d-flex align-items-center justify-content-center" style="background: linear-gradient(90deg, #e31e25, #ff5733);">
            <h4 class="m-0">
                <i class="fas fa-user-circle me-2"></i> PROFIL PEMILIK
            </h4>
        </div>

        <!-- Form -->
        <div class="p-4">
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
                            @if ($message === 'The name field is required.')
                                Data harus diisi
                            @elseif ($message === 'The name format is invalid.')
                                Format harus sesuai
                            @else
                                {{ $message }}
                            @endif
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
                            @if ($message === 'The username field is required.')
                                Data harus diisi
                            @elseif ($message === 'The username format is invalid.')
                                Format harus sesuai
                            @else
                                {{ $message }}
                            @endif
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        value="{{ old('email', auth()->user()->email) }}" required>
                    @error('email')
                        <div class="text-danger small">
                            @if ($message === 'The email field is required.')
                                Data harus diisi
                            @elseif ($message === 'The email must be a valid email address.')
                                Format harus sesuai
                            @else
                                {{ $message }}
                            @endif
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password (biarkan kosong jika tidak diubah)</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                        <span class="input-group-text">
                            <i class="fas fa-eye-slash toggle-password" data-target="password" style="cursor:pointer;"></i>
                        </span>
                    </div>
                </div>
            </form>

            <!-- Tombol Logout dan Simpan Perubahan sejajar -->
            <div class="d-flex justify-content-between mt-3 gap-3">
                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>

                <!-- Simpan -->
                <button type="submit" id="submitBtn" form="profileForm" class="btn btn-danger" disabled>
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        // Toggle password visibility
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
