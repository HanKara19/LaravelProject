@extends('layouts.master')

@section('title')
    Product Detail
@endsection

@section('content')

<div class="section">
    <div class="container">

        <div class="row">

            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="img-responsive"
                         alt="{{ $product->title }}">
                @else
                    <img src="{{ asset('assets') }}/img/product01.jpg"
                         class="img-responsive"
                         alt="">
                @endif
            </div>

            <div class="col-md-6">
                <h2>{{ $product->title }}</h2>

                <h3 class="product-price">
                    ${{ number_format($product->price, 2) }}
                </h3>

                <p>
                    {{ $product->description }}
                </p>

                <p>
                    <strong>Stock:</strong> {{ $product->stock }}
                </p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf

                    <label>Quantity</label>
                    <input type="number"
                           name="quantity"
                           value="1"
                           min="1"
                           max="{{ $product->stock }}"
                           class="form-control"
                           style="width:100px; margin-bottom:15px;">

                    <button type="submit" class="primary-btn add-to-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add To Cart
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection