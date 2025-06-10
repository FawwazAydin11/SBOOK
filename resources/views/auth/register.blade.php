<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Penyewaan Lapangan Badminton</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .auth-container {
            min-height: 100vh;
            padding: 20px 0;
            display: flex;
            align-items: center;
        }
        .auth-box {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            margin: 0 auto;
            background: white;
        }
        .auth-form {
            padding: 2rem;
        }
        .auth-image {
            background-image: url('https://lh3.googleusercontent.com/p/AF1QipOqEEXMd9J9T4i3mWEWRMFM06-jo8pTjaStYbb2=w750-h606-p-k-no');
            background-size: cover;
            background-position: center;
            position: relative;
            display: none;
        }
        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }
        .image-content {
            position: relative;
            z-index: 1;
            color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }
        .brand-logo {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .brand-logo span {
            color: #ffc107;
        }
        .auth-title {
            font-weight: 700;
            color: #e31e25;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .auth-subtitle {
            color: #6c757d;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        .form-control {
            height: 42px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-size: 0.9rem;
        }
        .form-control:focus {
            border-color: #e31e25;
            box-shadow: 0 0 0 0.25rem rgba(227, 30, 37, 0.25);
        }
        .btn-auth {
            background-color: #e31e25;
            border: none;
            height: 42px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            margin-top: 0.5rem;
        }
        .btn-auth:hover {
            background-color: #781113;
        }
        .error-message {
            color: #e31e25;
            font-size: 0.75rem;
            margin-top: 0.2rem;
            display: block;
            min-height: 18px;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 0.4rem;
            font-size: 0.9rem;
        }
        .auth-text {
            color: #6c757d;
            margin-top: 1.2rem;
            font-size: 0.9rem;
        }
        .auth-alt-link {
            color: #e31e25;
            font-weight: 600;
            text-decoration: none;
        }
        @media (min-width: 992px) {
            .auth-box {
                display: flex;
            }
            .auth-form {
                width: 60%;
                padding: 2rem;
            }
            .auth-image {
                display: block;
                width: 40%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid auth-container">
        <div class="container">
            <div class="auth-box">
                <!-- Form Register -->
                <div class="auth-form">
                    <div class="w-100">
                        <div class="text-center mb-3">
                            <h2 class="auth-title">BUAT AKUN BARU</h2>
                            <p class="auth-subtitle">Silakan isi formulir pendaftaran</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-2">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input id="name" class="form-control"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Masukkan nama lengkap" />
                                @error('name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="mb-2">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" class="form-control"
                                    type="text"
                                    name="username"
                                    value="{{ old('username') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="Masukkan username" />
                                @error('username')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-control"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="Masukkan email" />
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Buat password" />
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fa fa-eye-slash" id="eyeIcon1"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Ulangi password" />
                                    <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword">
                                        <i class="fa fa-eye-slash" id="eyeIcon2"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Register Button -->
                            <button type="submit" class="btn btn-auth w-100">
                                <i class="fas fa-user-plus me-1"></i> DAFTAR
                            </button>

                            <!-- Login Link -->
                            <p class="text-center auth-text">Sudah punya akun?
                                <a href="{{ route('login') }}" class="auth-alt-link">Masuk disini!</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Image Section (hidden on mobile) -->
                <div class="auth-image">
                    <div class="image-content">
                        <h1 class="brand-logo">8<span>BOOK</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

            document.addEventListener("DOMContentLoaded", function () {
                // Password toggle
                const passwordField = document.getElementById("password");
                const passwordBtn = document.getElementById("togglePassword");
                const eyeIcon1 = document.getElementById("eyeIcon1");

                if (passwordBtn && passwordField && eyeIcon1) {
                    passwordBtn.addEventListener("click", function () {
                        const isHidden = passwordField.type === "password";
                        passwordField.type = isHidden ? "text" : "password";
                        eyeIcon1.classList.toggle("fa-eye");
                        eyeIcon1.classList.toggle("fa-eye-slash");
                    });
                }

                // Confirm password toggle
                const confirmField = document.getElementById("password_confirmation");
                const confirmBtn = document.getElementById("toggleConfirmPassword");
                const eyeIcon2 = document.getElementById("eyeIcon2");

                if (confirmBtn && confirmField && eyeIcon2) {
                    confirmBtn.addEventListener("click", function () {
                        const isHidden = confirmField.type === "password";
                        confirmField.type = isHidden ? "text" : "password";
                        eyeIcon2.classList.toggle("fa-eye");
                        eyeIcon2.classList.toggle("fa-eye-slash");
                    });
                }
            });


    </script>
</body>
</html>
