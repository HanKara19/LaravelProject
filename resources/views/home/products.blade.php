@extends('layouts.home')

@section('title')
    Products
@endsection

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Products</h2>

    <div class="row">

        @foreach($products as $product)

            <div class="col-md-3 mb-4">

                <div class="card h-100">

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="card-img-top"
                             height="250">
                    @endif

                    <div class="card-body">

                        <h5>{{ $product->title }}</h5>

                        <p>
                            ${{ number_format($product->price, 2) }}
                        </p>

                        <a href="{{ route('product.detail', $product->id) }}"
                           class="btn btn-primary">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection