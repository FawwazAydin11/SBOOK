@extends('layouts.layout-pemilik')

@section('title', 'Profil Pemilik')

@section('content')
<div class="container py-4" style="font-family: 'Figtree';">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg overflow-hidden rounded-4">
                <div class="card-header py-3 text-white text-center" style="background: linear-gradient(135deg, #ff416c, #ff4b2b);">
                    <h3 class="mb-0 fw-bold">
                        <i class="fas fa-user-circle me-2"></i> PROFIL PEMILIK
                    </h3>
                </div>
                
                <div class="card-body p-4" style="background-color: #f9f9f9;">
                    <!-- Form Profil -->
                    <form method="POST" action="{{ route('profile.update') }}" id="profileForm" novalidate>
                        @csrf
                        @method('PATCH')

                        <div class="row g-3">
                            <!-- Nama Lengkap -->
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-user text-danger"></i></span>
                                    <input type="text" name="name" class="form-control border-start-0 ps-2 profile-input"
                                           value="{{ old('name', auth()->user()->name) }}"
                                           placeholder="Masukkan nama lengkap" required
                                           data-original-value="{{ auth()->user()->name }}"
                                           pattern="^[A-Za-z\s]+$">
                                    <div class="invalid-feedback">
                                        Harap isi nama lengkap dengan format yang benar
                                    </div>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="col-md-12 mb-3">
                                <label for="username" class="form-label fw-semibold text-secondary">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-at text-danger"></i></span>
                                    <input type="text" name="username" class="form-control border-start-0 ps-2 profile-input"
                                           value="{{ old('username', auth()->user()->username) }}"
                                           placeholder="Masukkan username" required
                                           data-original-value="{{ auth()->user()->username }}"
                                           pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$">
                                    <div class="invalid-feedback">
                                        Username harus mengandung huruf dan angka
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label fw-semibold text-secondary">Alamat Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-envelope text-danger"></i></span>
                                    <input type="email" name="email" class="form-control border-start-0 ps-2 profile-input"
                                           value="{{ old('email', auth()->user()->email) }}"
                                           placeholder="contoh@email.com" required
                                           data-original-value="{{ auth()->user()->email }}">
                                    <div class="invalid-feedback">
                                        Harap isi email yang valid
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-md-12 mb-4">
                                <label for="password" class="form-label fw-semibold text-secondary">Password (biarkan kosong jika tidak diubah)</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-danger"></i></span>
                                    <input type="password" name="password" class="form-control border-start-0 ps-2"
                                           placeholder="••••••••">
                                    <span class="input-group-text bg-white border-start-0">
                                        <i class="fas fa-eye-slash toggle-password" data-target="password" style="cursor:pointer;"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Logout dan Simpan Perubahan -->
                    <div class="d-flex justify-content-between mt-4 rounded-3">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger px-4 py-2 fw-semibold">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                        <button type="submit" id="submitBtn" form="profileForm" class="btn btn-danger px-4 py-2 fw-semibold" disabled>
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .form-control, .input-group-text {
        height: 45px;
        border-radius: 8px !important;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(255, 65, 108, 0.25);
        border-color: #ff416c;
    }

    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column-reverse;
            gap: 1rem;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password visibility
        const toggleIcons = document.querySelectorAll('.toggle-password');
        toggleIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });

        // Enable/disable tombol simpan
        const form = document.getElementById('profileForm');
        const inputs = form.querySelectorAll('.profile-input');
        const submitBtn = document.getElementById('submitBtn');
        const initialValues = {};

        // Simpan nilai awal
        inputs.forEach(input => {
            initialValues[input.name] = input.value;
        });

        // Cek perubahan
        function checkForChanges() {
            let hasChanges = false;
            
            inputs.forEach(input => {
                if (input.value !== initialValues[input.name]) {
                    hasChanges = true;
                }
            });

            // Cek juga password jika diisi
            const password = document.getElementById('password');
            if (password && password.value.length > 0) {
                hasChanges = true;
            }

            submitBtn.disabled = !hasChanges;
        }

        // Tambahkan event listener
        inputs.forEach(input => {
            input.addEventListener('input', checkForChanges);
            input.addEventListener('change', checkForChanges);
        });

        // Untuk password
        const passwordInput = document.getElementById('password');
        if (passwordInput) {
            passwordInput.addEventListener('input', checkForChanges);
        }

        // Validasi form
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
</script>

@if (session('status') == 'profile-updated' || session('status') == 'Profil berhasil diperbarui')
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Profil berhasil diperbarui.',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endsection