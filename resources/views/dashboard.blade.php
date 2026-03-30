@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0" style="font-family: 'Orbitron'; letter-spacing: 1px;">
            <i class="bi bi-grid-1x2-fill text-primary me-2"></i> Dashboard Overview
        </h2>
        <span class="badge bg-primary px-3 py-2 rounded-pill">
            <i class="bi bi-clock me-1"></i> {{ now()->format('D, d M Y') }}
        </span>
    </div>

    <div class="row g-4"> <div class="col-12 col-sm-6 col-xl-4">
            <div class="card-box h-100 d-flex flex-column justify-content-between" style="border-left: 4px solid #3b82f6;">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-uppercase text-white fw-bold small">Total Products</h6>
                        <h2 class="fw-bold mb-0 mt-2">{{ $productsCount ?? 0 }}</h2>
                    </div>
                    <div class="icon-box bg-primary bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-phone text-primary fs-3"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('products.index') }}" class="text-primary text-decoration-none small fw-bold">
                        View All <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card-box h-100 d-flex flex-column justify-content-between" style="border-left: 4px solid #10b981;">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-uppercase text-white fw-bold small">Total Brands</h6>
                        <h2 class="fw-bold mb-0 mt-2">{{ $categoriesCount ?? 0 }}</h2>
                    </div>
                    <div class="icon-box bg-success bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-tag text-success fs-3"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('categories.index') }}" class="text-success text-decoration-none small fw-bold">
                        Manage Brands <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card-box h-100 d-flex flex-column justify-content-between" style="border-left: 4px solid #f59e0b;">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-uppercase text-white fw-bold small">Total Orders</h6>
                        <h2 class="fw-bold mb-0 mt-2">0</h2>
                    </div>
                    <div class="icon-box bg-warning bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-cart-check text-warning fs-3"></i>
                    </div>
                </div>
                <div class="mt-3 text-warning small fw-bold italic">
                    <i class="bi bi-info-circle me-1"></i> No active orders yet
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5 p-4 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 d-flex align-items-center">
        <div class="fs-1 me-4">🚀</div>
        <div>
            <h5 class="fw-bold text-primary mb-1">Welcome back, Admin!</h5>
            <p class="text-white mb-0">Your system is running smoothly. Everything is under control.</p>
        </div>
    </div>

@endsection