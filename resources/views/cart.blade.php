@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold text-white mb-4" style="font-family: 'Orbitron';">Your Shopping Cart</h2>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card bg-dark border-secondary border-opacity-25 rounded-4 overflow-hidden">
                    <table class="table table-dark align-middle mb-0">
                        <thead class="bg-secondary bg-opacity-10">
                            <tr>
                                <th class="ps-4">Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $details['image']) }}" width="50"
                                                    class="rounded me-3">
                                                <span class="text-white small fw-bold">{{ $details['name'] }}</span>
                                            </div>
                                        </td>
                                        <td class="text-info">${{ number_format($details['price']) }}</td>
                                        <td>
                                            <input type="number" value="{{ $details['quantity'] }}"
                                                class="form-control bg-dark text-white border-secondary update-cart"
                                                style="width: 80px;" min="1" data-id="{{ $id }}">
                                        </td>
                                        <td class="text-success fw-bold">
                                            ${{ number_format($details['price'] * $details['quantity']) }}</td>
                                        <td class="text-end pe-4">
                                            <button class="btn btn-outline-danger btn-sm remove-from-cart"
                                                data-id="{{ $id }}"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center py-5">Cart is empty!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-dark border-primary border-opacity-25 rounded-4 p-4 text-white">
                    <h4 class="fw-bold mb-4">Summary</h4>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="fw-bold">Total</h5>
                        <h5 class="fw-bold text-primary">${{ number_format($total) }}</h5>
                    </div>
                    <a href="{{ route('checkout') }}"
                        class="btn btn-primary w-100 py-3 rounded-pill fw-bold {{ !session('cart') ? 'disabled' : '' }}">CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".update-cart").on('change', function() {
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).attr("data-id"),
                    quantity: $(this).val()
                },
                success: function() {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function() {
            if (confirm("Remove item?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "delete",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: $(this).attr("data-id")
                    },
                    success: function() {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
