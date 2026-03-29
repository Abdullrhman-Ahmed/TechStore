@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 shadow p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold text-primary mb-0" style="font-family: 'Orbitron';">Edit Product</h3>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">ID: #{{ $product->id }}</span>
                    </div>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold text-uppercase">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold text-uppercase">Brand (Category)</label>
                                <select name="category_id"
                                    class="form-select bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold text-uppercase">Price ($)</label>
                                <input type="number" name="price" value="{{ $product->price }}"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold text-uppercase">Stock Quantity</label>
                                <input type="number" name="stock" value="{{ $product->stock }}"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small fw-bold text-uppercase">Specifications</label>
                                <textarea name="description"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none" rows="4"
                                    required>{{ $product->description }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted small fw-bold text-uppercase">Product Image</label>
                                <div
                                    class="d-flex align-items-center gap-3 p-3 border border-secondary border-dashed rounded-3 mb-2">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" width="80"
                                            class="rounded shadow-sm">
                                    @endif
                                    <input type="file" name="image"
                                        class="form-control bg-transparent border-0 text-white">
                                </div>
                                <small class="text-muted">Leave empty to keep the current image.</small>
                            </div>
                        </div>

                        <div class="mt-5 d-flex gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill px-5 fw-bold shadow">Update
                                Product</button>
                            <a href="{{ route('products.index') }}"
                                class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
