@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')

    <h2 class="fw-bold mb-4">📊 Dashboard Overview</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card-box">
                <h5>Total Products</h5>
                <h3>{{ $productsCount ?? 0 }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <h5>Total Categories</h5>
                <h3>{{ $categoriesCount ?? 0 }}</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <h5>Orders</h5>
                <h3>0</h3>
            </div>
        </div>

    </div>

    <div class="alert alert-success mt-4">
        ✅ You're logged in successfully!
    </div>

@endsection
