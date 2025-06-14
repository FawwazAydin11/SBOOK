<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow-sm py-2">
    <div class="container">
        <!-- Brand/logo -->
        <a class="navbar-brand fw-bold text-danger fs-4 hover-scale" href="#" style="transition: all 0.3s ease;">
            <span class="text-warning">8</span>BOOK
        </a>

        <!-- Mobile toggle button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ownerNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="ownerNavbar">
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2 {{ Request::is('pemilik/dashboard') ? 'active' : '' }}" href="{{ url('/pemilik/dashboard') }}">
                        Dashboard
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded"
                              style="height: 2px; width: {{ Request::is('pemilik/dashboard') ? '70%' : '0' }}; transition: width 0.3s ease;"></span>
                    </a>
                </li>

                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2 {{ Request::is('pemilik/pesan/data') ? 'active' : '' }}" href="{{ url('/pemilik/pesan/data') }}">
                        Sewa
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded"
                              style="height: 2px; width: {{ Request::is('pemilik/pesan/data') ? '70%' : '0' }}; transition: width 0.3s ease;"></span>
                    </a>
                </li>

                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2 {{ Request::routeIs('fields.index') ? 'active' : '' }}" href="{{ route('fields.index') }}">
                        Lapangan
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded"
                              style="height: 2px; width: {{ Request::routeIs('fields.index') ? '70%' : '0' }}; transition: width 0.3s ease;"></span>
                    </a>
                </li>

                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2 {{ Request::is('pemilik/laporan*') ? 'active' : '' }}" href="#">
                        Laporan
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded"
                              style="height: 2px; width: {{ Request::is('pemilik/laporan*') ? '70%' : '0' }}; transition: width 0.3s ease;"></span>
                    </a>
                </li>

                <li class="nav-item mx-1 mx-lg-2">
                    <a class="nav-link fw-medium position-relative px-2 {{ Request::is('akun') ? 'active' : '' }}" href="{{ url('/akun') }}">
                        Akun
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-danger rounded"
                              style="height: 2px; width: {{ Request::is('akun') ? '70%' : '0' }}; transition: width 0.3s ease;"></span>
                    </a>
                </li>

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
        if (!link.classList.contains('active')) {
            link.addEventListener('mouseenter', function () {
                this.querySelector('span').style.width = '70%';
            });
            link.addEventListener('mouseleave', function () {
                this.querySelector('span').style.width = '0';
            });
        }
    });

    // Add hover effect to brand and buttons
    const hoverElements = document.querySelectorAll('.hover-scale');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', function () {
            this.style.transform = 'scale(1.05)';
        });
        el.addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>

<style>
    .nav-link.active {
        color: #e31e25 !important;
        font-weight: 600;
    }
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
