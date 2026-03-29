@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-white" style="font-family: 'Orbitron';">Mobile Inventory</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-plus-lg me-2"></i>Add New Product
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success bg-success bg-opacity-10 border-success text-success rounded-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="card bg-dark border-secondary border-opacity-25 rounded-4 shadow overflow-hidden">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="bg-secondary bg-opacity-10">
                        <tr>
                            <th class="ps-4">Product</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $product->image) }}" width="50"
                                            class="rounded-3 me-3">
                                        <span class="fw-bold">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td><span
                                        class="badge bg-info bg-opacity-10 text-info">{{ $product->category->name }}</span>
                                </td>
                                <td class="text-success fw-bold">${{ number_format($product->price, 0) }}</td>
                                <td>{{ $product->stock }} units</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="btn btn-outline-light btn-sm rounded-start-pill">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm rounded-end-pill"
                                                onclick="return confirm('Delete this product?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
