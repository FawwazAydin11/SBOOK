
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #fff;
        font-family: 'Inter', sans-serif;
    }
    .hero-section {
        padding: 3rem 1rem;
        background: linear-gradient(135deg, #ffffff 0%, #f3eaff 100%);
        background-image: url('{{ asset('raket.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 88.1vh;
        display: flex;
        align-items: center;
    }
    .hero-text h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #111;
        text-shadow: 0 1px 3px rgba(0,0,0,0.4);
    }

    .hero-text p {
        font-size: 1.3rem;
        color: #f9f7f7;
        margin-top: 1rem;
        text-shadow: 0 1px 3px rgba(0,0,0,0.4);
    }

    .btn-gradient {
        background: linear-gradient(90deg, #e94e77, #f77062);
        color: #fff;
        font-weight: 600;
        padding: 0.8rem 2rem;
        border-radius: 30px;
        border: none;
        box-shadow: 0px 5px 15px rgba(255, 79, 127, 0.3);
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        opacity: 0.9;
    }

    /* Navbar Styles */
    .navbar {
        padding: 0.8rem 1rem;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-bottom: 3px solid #ccc;
    }

    .navbar-brand {
        font-weight: 800;
        font-size: 1.5rem;
        color: #111;
    }

    .auth-buttons .btn {
        font-weight: 600;
        padding: 0.5rem 1.2rem;
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        .hero-text h1 {
            font-size: 2rem;
        }
        .hero-text {
            text-align: center;
        }
        .auth-buttons {
            flex-direction: column;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand ms-5" href="#">SBOOK</a>        
        @guest
        <div class="auth-buttons d-flex me-5 px-1">
            <a href="{{ route('login') }}" class="btn btn-outline-dark me-3 px-4">Log in</a>
            <a href="{{ route('register') }}" class="btn btn-dark ">Sign up</a>
        </div>
        @endguest
    </div>
</nav>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 hero-text mb-4 mb-md-0">
                <h1>Main Badminton <br>Jadi Makin Seru!</h1>
                <p>Temukan lapangan terbaik di kota Jember. Booking mudah, harga terjangkau, dan kualitas lapangan terjamin!</p>
                <a href="/register" class="btn btn-gradient mt-4">Coba Sekarang</a>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
