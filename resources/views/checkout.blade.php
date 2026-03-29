@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 p-4 shadow-lg text-white">
                    <h4 class="fw-bold mb-4" style="font-family: 'Orbitron';"><i
                            class="bi bi-truck text-primary me-2"></i>Shipping Information</h4>

                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white-50 small fw-bold">FULL NAME</label>
                                <input type="text" name="name"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 p-3 shadow-none"
                                    placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-white-50 small fw-bold">PHONE NUMBER</label>
                                <input type="text" name="phone"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 p-3 shadow-none"
                                    placeholder="+20 123..." required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-white-50 small fw-bold">SHIPPING ADDRESS</label>
                                <textarea name="address"
                                    class="form-control bg-secondary bg-opacity-10 border-secondary text-white rounded-3 p-3 shadow-none" rows="3"
                                    placeholder="Street name, Building, City" required></textarea>
                            </div>

                            <h4 class="fw-bold mt-5 mb-3" style="font-family: 'Orbitron';"><i
                                    class="bi bi-credit-card text-primary me-2"></i>Payment Method</h4>
                            <div class="col-12">
                                <div
                                    class="form-check p-3 border border-primary border-opacity-25 rounded-3 bg-primary bg-opacity-5 mb-3">
                                    <input class="form-check-input ms-0 me-3" type="radio" name="payment" id="cod"
                                        checked>
                                    <label class="form-check-label fw-bold text-white" for="cod">
                                        Cash on Delivery (COD)
                                    </label>
                                </div>
                                <div class="form-check p-3 border border-secondary border-opacity-25 rounded-3 opacity-50">
                                    <input class="form-check-input ms-0 me-3" type="radio" name="payment" id="card"
                                        disabled>
                                    <label class="form-check-label fw-bold text-muted" for="card">
                                        Credit Card (Coming Soon)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-lg mt-5">
                            CONFIRM ORDER <i class="bi bi-check-circle ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 p-4 shadow text-white position-sticky"
                    style="top: 2rem;">
                    <h5 class="fw-bold mb-4 border-bottom border-secondary pb-2">Order Summary</h5>

                    @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $details['image']) }}" width="50"
                                        class="rounded-2 me-3 border border-secondary border-opacity-25">
                                    <div>
                                        <h6 class="mb-0 small fw-bold">{{ $details['name'] }}</h6>
                                        <small class="text-muted">Qty: {{ $details['quantity'] }}</small>
                                    </div>
                                </div>
                                <span
                                    class="fw-bold text-info">${{ number_format($details['price'] * $details['quantity'], 0) }}</span>
                            </div>
                        @endforeach
                    @endif

                    <hr class="border-secondary opacity-25 mt-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Delivery Fee</span>
                        <span class="text-success small fw-bold">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="fw-bold">Total</h5>
                        <h4 class="fw-bold text-primary">${{ number_format($total, 0) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
