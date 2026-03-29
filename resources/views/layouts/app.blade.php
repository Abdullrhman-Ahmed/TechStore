<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TECH-STORE | Premium Mobiles</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Orbitron:wght@500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --main-bg: #0f172a;
            --card-bg: #1e293b;
            --accent: #3b82f6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--main-bg);
            color: #f1f5f9;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.8) !important;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--accent) !important;
        }

        .btn-primary {
            background: var(--accent);
            border: none;
            font-weight: 600;
            border-radius: 8px;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            border-color: var(--accent);
        }
    </style>
</head>

<body>
    @include('layouts.navigation')

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="py-5 text-center text-white border-top border-secondary mt-5">
        <p>&copy; 2026 TECH-STORE. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
