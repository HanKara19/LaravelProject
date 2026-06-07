@extends('layouts.admin')

@section('title')
    Orders List
@endsection

@section('content')

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Orders List</h3>
        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($orders as $order)

                                <tr>

                                    <td>{{ $order->id }}</td>

                                    <td>
                                        {{ $order->user->name ?? 'Guest' }}
                                    </td>

                                    <td>
                                        ${{ $order->total }}
                                    </td>

                                    <td>
                                        {{ ucfirst($order->status) }}
                                    </td>

                                    <td>
                                        {{ $order->created_at }}
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                           class="btn btn-info btn-sm">
                                            Show
                                        </a>

                                        <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                              method="POST"
                                              style="display:inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete this order?')">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection