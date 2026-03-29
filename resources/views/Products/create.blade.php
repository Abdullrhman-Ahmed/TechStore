@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 shadow-lg p-4 text-white">

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                            <i class="bi bi-plus-circle-fill text-primary fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0" style="font-family: 'Orbitron', sans-serif;">Add New Mobile</h3>
                            <p class="text-muted mb-0 small text-uppercase tracking-wider">Product Inventory Management</p>
                        </div>
                    </div>

                    <hr class="border-secondary opacity-25 mb-4">

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold mb-2">Product Name</label>
                                <input type="text" name="name"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none p-2"
                                    placeholder="e.g. iPhone 15 Pro Max" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold mb-2">Brand (Category)</label>
                                <select name="category_id"
                                    class="form-select bg-dark border-secondary text-white rounded-3 shadow-none p-2">
                                    <option value="" selected disabled>Select Brand</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold mb-2">Price ($)</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text bg-secondary bg-opacity-20 border-secondary text-white">$</span>
                                    <input type="number" name="price"
                                        class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-end-3 shadow-none p-2"
                                        placeholder="0.00" step="0.01" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold mb-2">Stock Quantity</label>
                                <input type="number" name="stock"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none p-2"
                                    value="0" min="0">
                            </div>

                            <div class="col-12">
                                <label class="form-label text-white fw-bold mb-2">Specifications / Description</label>
                                <textarea name="description"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none p-3" rows="5"
                                    placeholder="Enter processor, RAM, Camera details..." required></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-white fw-bold mb-2">Product Image</label>
                                <div class="input-group">
                                    <input type="file" name="image"
                                        class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 shadow-none">
                                </div>
                                <small class="text-muted">Recommended size: 800x800px (PNG or JPG)</small>
                            </div>
                        </div>

                        <div class="mt-5 d-flex gap-3">
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow">
                                <i class="bi bi-check-lg me-1"></i> Save Product
                            </button>
                            <a href="{{ route('products.index') }}"
                                class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6 !important;
            background-color: rgba(59, 130, 246, 0.05) !important;
        }

        label {
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
    </style>
@endsection
