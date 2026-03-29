<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | TECH-STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Orbitron:wght@600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #020617;
            color: white;
        }

        .sidebar {
            min-height: 100vh;
            background: #0f172a;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-link {
            color: #94a3b8;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #3b82f6;
            color: white;
        }

        .card-box {
            background: #1e293b;
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar py-4">
                <h4 class="text-center text-primary fw-bold mb-5" style="font-family: 'Orbitron';">ADMIN</h4>
                <ul class="nav flex-column px-2">
                    <li><a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i
                                class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                    <li><a href="{{ route('categories.index') }}"
                            class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"><i
                                class="bi bi-grid me-2"></i> Brands</a></li>
                    <li><a href="{{ route('products.index') }}"
                            class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"><i
                                class="bi bi-phone me-2"></i> Mobiles</a></li>
                    <li class="mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger w-100 rounded-pill">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <main class="col-md-10 py-5 px-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
