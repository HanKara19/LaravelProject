@extends('layouts.admin')

@section('title')
    Order Detail
@endsection

@section('content')

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <h3>Order #{{ $order->id }}</h3>
        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card mb-4">

                <div class="card-header">
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                </div>

                <div class="card-body">

                    <p><strong>Name:</strong> {{ $order->name }}</p>

                    <p><strong>Email:</strong> {{ $order->email }}</p>

                    <p><strong>Phone:</strong> {{ $order->phone }}</p>

                    <p><strong>Address:</strong> {{ $order->address }}</p>

                    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

                </div>

            </div>

            <div class="card mb-4">

                <div class="card-header">
                    <h3 class="card-title">Order Items</h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>

                        @foreach($order->items as $item)

                            <tr>

                                <td>
                                    {{ $item->product->title ?? 'Deleted Product' }}
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                                <td>
                                    ${{ $item->price }}
                                </td>

                                <td>
                                    ${{ $item->total }}
                                </td>

                            </tr>

                        @endforeach

                    </table>

                </div>

            </div>

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Order Status</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.orders.update', $order->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <select name="status"
                                class="form-select mb-3">

                            <option value="pending"
                                {{ $order->status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="processing"
                                {{ $order->status == 'processing' ? 'selected' : '' }}>
                                Processing
                            </option>

                            <option value="completed"
                                {{ $order->status == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                            <option value="cancelled"
                                {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>

                        </select>

                        <button type="submit"
                                class="btn btn-success">
                            Update Status
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection