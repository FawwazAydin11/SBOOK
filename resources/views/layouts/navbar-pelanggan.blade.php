<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
    <div class="container">
        <!-- Brand/logo with subtle animation -->
        <a class="navbar-brand fw-bold text-danger fs-4 hover-scale" href="#" style="transition: all 0.3s ease;">
            <span class="text-warning">8</span>BOOK
        </a>

        <!-- Mobile toggle button with better styling -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items with refined styling -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2" href="{{ url('/pelanggan/dashboard') }}">
                        Dashboard
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded" style="height: 2px; width: 0; transition: width 0.3s ease;"></span>
                    </a>
                </li>
                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2" href="{{ url('/pelanggan/jadwal') }}">
                        Sewa Lapangan
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded" style="height: 2px; width: 0; transition: width 0.3s ease;"></span>
                    </a>
                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2" href="{{ url('/pelanggan/profil') }}">
                        Profil
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded" style="height: 2px; width: 0; transition: width 0.3s ease;"></span>
                    </a>
                </li>

                {{-- <li class="nav-item ms-1 ms-lg-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 px-3 rounded-pill hover-scale" style="transition: all 0.3s ease;">
                            Logout
                        </button>
                    </form>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom hover effects -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effect to nav links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.querySelector('span').style.width = '70%';
        });
        link.addEventListener('mouseleave', function() {
            this.querySelector('span').style.width = '0';
        });
    });

    // Add hover effect to brand and buttons
    const hoverElements = document.querySelectorAll('.hover-scale');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        el.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>

<style>
    .nav-link.active span {
        width: 70% !important;
    }
    .nav-link:hover {
        color: #e31e25 !important;
    }
    .btn-outline-danger:hover {
        background-color: #e31e25 !important;
        color: white !important;
    }
</style>
