<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Penyewaan Lapangan Badminton</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .login-container {
            height: 100vh;
        }
        .login-box {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 80vh;
            max-height: 700px;
        }
        .login-form {
            padding: 3rem;
            background: white;
        }
        .login-image {
            background-image: url('https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 100, 0, 0.6);
        }
        .login-title {
            font-weight: 700;
            color: #2e8b57;
            margin-bottom: 1rem;
        }
        .login-subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
        }
        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #2e8b57;
            box-shadow: 0 0 0 0.25rem rgba(46, 139, 87, 0.25);
        }
        .btn-login {
            background-color: #2e8b57;
            border: none;
            height: 50px;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-login:hover {
            background-color: #247347;
        }
        .btn-google {
            background-color: white;
            border: 1px solid #ced4da;
            height: 50px;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-google:hover {
            background-color: #f8f9fa;
        }
        .form-check-input:checked {
            background-color: #2e8b57;
            border-color: #2e8b57;
        }
        .forgot-link {
            color: #6c757d;
            text-decoration: none;
        }
        .forgot-link:hover {
            color: #2e8b57;
        }
        .register-text {
            color: #6c757d;
        }
        .register-link {
            color: #2e8b57;
            font-weight: 600;
            text-decoration: none;
        }
        .image-content {
            position: relative;
            z-index: 1;
            color: white;
            padding: 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        @media (max-width: 991.98px) {
            .login-image {
                display: none;
            }
            .login-form {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid login-container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <div class="login-box d-flex">
                    <!-- Form Login (Kiri) -->
                    <div class="login-form col-md-6 d-flex align-items-center">
                        <div class="w-100">
                            <div class="text-center mb-5">
                                <h2 class="login-title">SELAMAT DATANG KEMBALI</h2>
                                <p class="login-subtitle">Silakan masuk dengan akun Anda</p>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
                                </div>

                                <!-- Ingat Saya & Lupa Password -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">Ingat saya</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a>
                                </div>

                                <!-- Tombol Masuk -->
                                <button type="submit" class="btn btn-login btn-primary w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i> MASUK
                                </button>

                                <!-- Masuk dengan Google -->
                                <button type="button" class="btn btn-google w-100 mb-4">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="20" class="me-2" alt="Google">
                                    Masuk dengan Google
                                </button>

                                <!-- Daftar Akun -->
                                <p class="text-center register-text">Belum punya akun? <a href="{{ route('register') }}" class="register-link">Daftar gratis!</a></p>
                            </form>
                        </div>
                    </div>

                    <!-- Gambar (Kanan) -->
                    <div class="login-image col-md-6 d-none d-md-block">
                        <div class="image-content">
                            <h1 class="display-4 fw-bold mb-4">SHUTTLE<span class="text-warning">PRO</span></h1>
                            <p class="lead mb-5">Sewa lapangan badminton berkualitas dengan harga terjangkau</p>
                            <div class="text-center">
                                <i class="fas fa-table-tennis fa-5x mb-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
