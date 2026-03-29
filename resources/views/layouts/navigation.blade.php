<nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow-sm p-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="font-family: 'Orbitron', sans-serif;">
            <span class="text-primary">TECH</span>STORE
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active text-primary' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active text-primary' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active text-primary' : '' }}"
                        href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item px-lg-3 py-2 py-lg-0">
                    <a class="nav-link position-relative d-inline-block" href="{{ route('cart') }}">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.65rem;">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </a>
                </li>

                @auth
                    @if (auth()->user()->email == 'admin@gmail.com')
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-info" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i>Admin Panel
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle text-white fw-bold px-3 border border-secondary rounded-pill"
                            href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow border-secondary mt-2">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                        class="bi bi-gear me-2"></i>Profile Settings</a></li>
                            <li>
                                <hr class="dropdown-divider border-secondary">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger fw-bold">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ms-lg-3 d-flex gap-2">
                        <a class="btn btn-outline-primary btn-sm px-4 rounded-pill" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-primary btn-sm px-4 rounded-pill shadow-sm"
                            href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    /* تحسين شكل الـ Navbar والتأثيرات */
    .navbar {
        background: rgba(15, 23, 42, 0.95) !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-link {
        transition: 0.3s;
        font-size: 0.95rem;
    }

    .dropdown-item {
        padding: 10px 20px;
        font-size: 0.9rem;
    }

    .btn-primary {
        background: #3b82f6;
        border-color: #3b82f6;
    }

    .btn-primary:hover {
        background: #2563eb;
        transform: translateY(-1px);
    }
</style>
