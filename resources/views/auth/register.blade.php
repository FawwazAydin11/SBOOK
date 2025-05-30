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
            height: 100vh;
            /* padding-top: 0;
            padding-bottom: 0; */
            width: 100%;
        }
        .auth-box {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 110vh;
            max-height: 700px;
        }
        .auth-form {
            padding: 3rem;
            background: white;
            border-radius: 15px;
        }
        .auth-image {
            background-image: url('https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .auth-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 100, 0, 0.6);
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .auth-title {
            font-weight: 700;
            color: #2e8b57;
        }
        .auth-subtitle {
            color: #6c757d;
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
        .btn-auth {
            background-color: #2e8b57;
            border: none;
            height: 50px;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-auth:hover {
            background-color: #247347;
        }
        .form-check-input:checked {
            background-color: #2e8b57;
            border-color: #2e8b57;
        }
        .auth-link {
            color: #6c757d;
            text-decoration: none;
        }
        .auth-link:hover {
            color: #2e8b57;
        }
        .auth-text {
            color: #6c757d;
        }
        .auth-alt-link {
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
            .auth-image {
                display: none;
            }
            .auth-form {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid login-container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10 mb-5"> <!-- Added mb-5 here -->
                <div class="auth-box d-flex">
                    <!-- Form Register -->
                    <div class="auth-form col-md-6 d-flex align-items-center">
                        <div class="w-100 py-4">
                            <div class="text-center mb-5">
                                <h2 class="auth-title mt-2">BUAT AKUN BARU</h2>
                                <p class="auth-subtitle">Silakan isi formulir pendaftaran</p>
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

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="mb-4">
                                    <x-input-label for="name" :value="__('Nama Lengkap')" class="form-label" />
                                    <x-text-input id="name" class="form-control" 
                                        type="text" 
                                        name="name" 
                                        :value="old('name')" 
                                        required 
                                        autofocus 
                                        autocomplete="name" 
                                        placeholder="Masukkan nama lengkap Anda" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                </div>

                                <!-- Email Address -->
                                <div class="mb-4">
                                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                                    <x-text-input id="email" class="form-control"
                                        type="email"
                                        name="email"
                                        :value="old('email')"
                                        required
                                        autocomplete="username"
                                        placeholder="Masukkan email Anda" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                                    <x-text-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Masukkan password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="form-label" />
                                    <x-text-input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password"
                                        placeholder="Masukkan kembali password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                </div>

                                <!-- Register Button -->
                                <button type="submit" class="btn btn-auth w-100 mb-3">
                                    <i class="fas fa-user-plus me-2"></i> DAFTAR
                                </button>

                                <!-- Login Link -->
                                <p class="text-center auth-text">Sudah punya akun? <a href="{{ route('login') }}" class="auth-alt-link">Masuk disini!</a></p>
                            </form>
                        </div>
                    </div>

                    <!-- Image Section -->
                    <div class="auth-image col-md-6 d-none d-md-block">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>