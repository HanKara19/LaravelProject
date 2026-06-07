@extends('layouts.home')

@section('title')
    My Cart
@endsection

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">My Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($cartItems->count() > 0)

        @php
            $subtotal = 0;
        @endphp

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th width="180">Quantity</th>
                    <th>Total</th>
                    <th width="100">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($cartItems as $item)

                    @php
                        $lineTotal = $item->price * $item->quantity;
                        $subtotal += $lineTotal;
                    @endphp

                    <tr>

                        <td>
                            @if($item->product && $item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                     width="70">
                            @endif
                        </td>

                        <td>
                            {{ $item->product->title ?? 'Deleted Product' }}
                        </td>

                        <td>
                            ${{ number_format($item->price, 2) }}
                        </td>

                        <td>

                            <form action="{{ route('cart.update', $item->id) }}"
                                  method="POST">

                                @csrf

                                <div class="d-flex">

                                    <input type="number"
                                           name="quantity"
                                           value="{{ $item->quantity }}"
                                           min="1"
                                           class="form-control me-2">

                                    <button type="submit"
                                            class="btn btn-primary btn-sm">
                                        Update
                                    </button>

                                </div>

                            </form>

                        </td>

                        <td>
                            ${{ number_format($lineTotal, 2) }}
                        </td>

                        <td>

                            <form action="{{ route('cart.remove', $item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

            <tfoot>

                <tr>
                    <th colspan="4" class="text-end">
                        Total
                    </th>

                    <th colspan="2">
                        ${{ number_format($subtotal, 2) }}
                    </th>
                </tr>

            </tfoot>

        </table>

    @else

        <div class="alert alert-info">
            Your cart is empty.
        </div>

    @endif

</div>

@endsection