<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TechStore') }} - Admin Access</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a; 
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(45, 212, 191, 0.05) 0%, transparent 50%);
            margin: 0;
            color: #f8fafc;
        }

        .guest-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 1.5rem;
        }

        .logo-container {
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .logo-container:hover {
            transform: scale(1.05);
        }

        .logo-text {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 2.5rem;
            background: linear-gradient(45deg, #3b82f6, #2dd4bf);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        .content-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
    </style>
</head>

<body class="antialiased">
    <div class="guest-container">
        <div class="logo-container text-center">
            <a href="/" class="text-decoration-none">
                <span class="logo-text">TechStore</span>
            </a>
            <p class="text-xs text-blue-500/50 mt-2 tracking-widest uppercase">Management System</p>
        </div>

        <div class="content-wrapper">
            {{ $slot }}
        </div>
    </div>
</body>

</html>