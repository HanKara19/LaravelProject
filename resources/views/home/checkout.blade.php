@extends('layouts.master')

@section('title')
    Checkout
@endsection

@section('content')

<div class="section">
    <div class="container">

        <h2 class="mb-4">Checkout</h2>

        <form action="{{ route('place.order') }}" method="POST">
            @csrf

            <div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-4">
                    <h3>Billing Details</h3>

                    <input class="form-control mb-3" type="text" name="name"
                           placeholder="Full Name"
                           value="{{ old('name', Auth::user()->name ?? '') }}"
                           required>

                    <input class="form-control mb-3" type="email" name="email"
                           placeholder="Email"
                           value="{{ old('email', Auth::user()->email ?? '') }}"
                           required>

                    <input class="form-control mb-3" type="text" name="phone"
                           placeholder="Phone">

                    <textarea class="form-control mb-3" name="address"
                              placeholder="Address"
                              required></textarea>
                </div>

                <div class="col-md-5">
    <h3>Order Summary</h3>

                    <table class="table table-bordered">
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>

                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->title ?? 'Deleted Product' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <th colspan="2">Grand Total</th>
                            <th>${{ number_format($total, 2) }}</th>
                        </tr>
                    </table>

                    <button type="submit" class="primary-btn">
                        Place Order
                    </button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection