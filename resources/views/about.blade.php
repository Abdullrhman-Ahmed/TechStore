@extends('layouts.app')

@section('content')
    <div class="container py-5 text-white">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-primary mb-4" style="font-family: 'Orbitron';">About TechStore</h1>
                <p class="lead opacity-75">We are leading the future of mobile technology by providing the latest smartphones
                    with high-end specifications. Our mission is to make advanced tech accessible to everyone.</p>
                <div class="row mt-4 g-3">
                    <div class="col-6">
                        <div class="p-3 bg-dark border border-secondary rounded-4 shadow-sm">
                            <h3 class="text-primary fw-bold">100%</h3>
                            <p class="small mb-0 opacity-50">Genuine Products</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-dark border border-secondary rounded-4 shadow-sm">
                            <h3 class="text-primary fw-bold">24/7</h3>
                            <p class="small mb-0 opacity-50">Expert Support</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="bi bi-cpu display-1 text-primary opacity-25"></i>
                <div class="p-5 border border-primary border-opacity-25 rounded-5 bg-primary bg-opacity-5 shadow-lg">
                    <h2 class="fw-bold">Our Vision</h2>
                    <p class="mb-0 italic opacity-75">"To be the world's most trusted destination for cutting-edge mobile
                        devices."</p>
                </div>
            </div>
        </div>
    </div>
@endsection
