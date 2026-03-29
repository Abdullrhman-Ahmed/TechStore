@extends('layouts.app')

@section('content')
    <div class="container py-4">

        @if (session('success'))
            <div
                class="alert alert-success bg-success bg-opacity-10 border-success text-success rounded-4 shadow-sm mb-4 d-flex align-items-center animate__animated animate__fadeIn">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <strong class="d-block">Success!</strong>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close ms-auto shadow-none" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <div class="rounded-5 p-5 mb-5 shadow-lg text-center position-relative overflow-hidden"
            style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border: 1px solid rgba(59, 130, 246, 0.2);">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-5 blur-3xl"></div>
            <div class="position-relative z-1">
                <h1 class="display-3 fw-bold text-white mb-3"
                    style="font-family: 'Orbitron', sans-serif; letter-spacing: 2px;">Unleash The Future</h1>
                <p class="lead text-light opacity-75 mb-4 fs-4">Discover the most advanced smartphones with cutting-edge
                    technology.</p>
                <a href="#shop" class="btn btn-primary btn-lg px-5 rounded-pill shadow-lg fw-bold">Explore Now <i
                        class="bi bi-arrow-down ms-2"></i></a>
            </div>
        </div>

        <div class="row g-4" id="shop">
            <div class="col-lg-3">
                <div class="sticky-top" style="top: 2rem;">
                    <h5 class="fw-bold mb-4 text-primary text-uppercase small" style="letter-spacing: 2px;">
                        <i class="bi bi-grid-fill me-2"></i> Brands Explorer
                    </h5>
                    <div class="list-group shadow-sm border-0 rounded-4 overflow-hidden">
                        <a href="{{ route('home') }}"
                            class="list-group-item list-group-item-action border-0 py-3 ps-4 shadow-none {{ !request()->id ? 'bg-primary text-white' : 'bg-dark text-light opacity-75' }}">
                            <i class="bi bi-infinity me-2"></i> All Brands
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ route('category.filter', $category->id) }}"
                                class="list-group-item list-group-item-action border-0 py-3 ps-4 shadow-none {{ request()->id == $category->id ? 'bg-primary text-white' : 'bg-dark text-light opacity-75' }}">
                                <i class="bi bi-chevron-right small me-2"></i> {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">
                    @forelse($meals as $mobile)
                        <div class="col-md-6 col-xl-4">
                            <div
                                class="card h-100 bg-dark border-secondary border-opacity-25 rounded-4 shadow-sm hover-up overflow-hidden">
                                <div class="p-4 text-center bg-secondary bg-opacity-10 position-relative">
                                    @if ($mobile->image)
                                        <img src="{{ asset('storage/' . $mobile->image) }}" class="img-fluid rounded-3"
                                            style="height: 220px; object-fit: contain;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-20 rounded-3"
                                            style="height: 220px;">
                                            <i class="bi bi-phone display-1 text-muted"></i>
                                        </div>
                                    @endif
                                    <span
                                        class="position-absolute top-0 end-0 m-3 badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 rounded-pill px-3 py-2">
                                        {{ $mobile->category->name }}
                                    </span>
                                </div>

                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold text-white mb-2">{{ $mobile->name }}</h5>
                                    <h4 class="text-primary fw-bold mb-4">${{ number_format($mobile->price, 0) }}</h4>

                                    <div class="d-grid gap-2">
                                        <a href="{{ route('add.to.cart', $mobile->id) }}"
                                            class="btn btn-outline-primary rounded-pill py-2 fw-bold transition">
                                            <i class="bi bi-cart-plus me-2"></i> Add to Cart
                                        </a>
                                        <a href="{{ route('product.details', $mobile->id) }}"
                                            class="btn btn-link text-white btn-sm text-decoration-none py-1">
                                            Full Specifications <i class="bi bi-arrow-right small ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-search display-1 text-muted opacity-25"></i>
                            <p class="mt-3 text-muted">No products found in this brand.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-up {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-up:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .5) !important;
        }

        .blur-3xl {
            filter: blur(80px);
        }

        .list-group-item:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #fff !important;
        }
    </style>
@endsection
