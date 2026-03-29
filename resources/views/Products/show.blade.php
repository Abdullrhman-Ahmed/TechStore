@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div
                    class="position-relative p-4 rounded-5 bg-dark border border-secondary border-opacity-25 shadow-lg overflow-hidden">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-5 blur-3xl"></div>
                    @if ($mobile->image)
                        <img src="{{ asset('storage/' . $mobile->image) }}"
                            class="img-fluid rounded-4 position-relative z-1 shadow" alt="{{ $mobile->name }}">
                    @else
                        <div class="text-center py-5"><i class="bi bi-phone display-1 text-muted"></i></div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb mb-0 bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                    class="text-primary text-decoration-none small fw-bold">STORE</a></li>
                            <li class="breadcrumb-item active text-muted small" aria-current="page">
                                {{ $mobile->category->name }}</li>
                        </ol>
                    </nav>

                    <h1 class="display-5 fw-bold text-white mb-2" style="font-family: 'Orbitron'; letter-spacing: 1px;">
                        {{ $mobile->name }}</h1>

                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="fs-2 fw-bold text-info">${{ number_format($mobile->price, 0) }}</span>
                        <span class="badge bg-{{ $mobile->stock > 0 ? 'success' : 'danger' }} rounded-pill px-3 py-2">
                            {{ $mobile->stock > 0 ? 'Available in Stock' : 'Out of Stock' }}
                        </span>
                    </div>

                    <div class="p-4 rounded-4 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 mb-5">
                        <h6 class="text-primary fw-bold text-uppercase mb-3 small" style="letter-spacing: 2px;">Key
                            Specifications</h6>
                        <p class="text-light opacity-75 lh-lg mb-0" style="white-space: pre-line;">
                            {{ $mobile->description }}
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('add.to.cart', $mobile->id) }}"
                            class="btn btn-primary btn-lg px-5 rounded-pill shadow-lg d-flex align-items-center">
                            <i class="bi bi-cart-plus fs-4 me-2"></i> Add to Cart
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .blur-3xl {
            filter: blur(60px);
        }
    </style>
@endsection
