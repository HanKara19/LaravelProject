@extends('layouts.master')

@section('slider')
     @include('front.slider')
@endsection

@section('content')
     	<!-- Featured Products Section -->
<div class="section">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Featured Technology Products</h2>
                </div>
            </div>

            @php
                $featuredProducts = [
                    [
                        'title' => 'iPhone 17',
                        'price' => '49,999.99',
                        'image' => '1_org_zoom.webp',
                        'link' => '#'
                    ],
                    [
                        'title' => 'iPhone 15',
                        'price' => '67,777.00',
                        'image' => 'iPhone 15 1.jpeg',
                        'link' => '#'
                    ],
                    [
                        'title' => 'iPhone 16',
                        'price' => '56,999.00',
                        'image' => 'iPhone 16 1.webp',
                        'link' => '#'
                    ],
                    [
                        'title' => 'iPhone 18',
                        'price' => '180,000.00',
                        'image' => 'The iPhone 18.jpeg',
                        'link' => '#'
                    ],
                    [
                        'title' => 'HP Omen Max 16',
                        'price' => '89,000.00',
                        'image' => 'OMEN Max 16 inch Gaming Laptop.png',
                        'link' => '#'
                    ],
                    [
                        'title' => 'Lenovo LOQ',
                        'price' => '99,999.00',
                        'image' => 'Lenovo Loq 15IAX9.jpg',
                        'link' => '#'
                    ],
                    [
                        'title' => 'Gaming Headset',
                        'price' => '12,000.00',
                        'image' => 'kulaklık1.jpeg',
                        'link' => '#'
                    ],
                    [
                        'title' => 'Smart Watch',
                        'price' => '25,000.00',
                        'image' => 'smartwatch.jpeg',
                        'link' => '#'
                    ],
                ];
            @endphp

            @foreach($featuredProducts as $item)

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">

                        <div class="product-thumb">
                            <a href="{{ $item['link'] }}">
                                <img src="{{ asset('assets/img/products/' . $item['image']) }}"
                                     alt="{{ $item['title'] }}"
                                     style="height:220px; object-fit:contain; width:100%; background:#fff;">
                            </a>
                        </div>

                        <div class="product-body">

                            <h3 class="product-price">
                                ${{ $item['price'] }}
                            </h3>

                            <h2 class="product-name">
                                <a href="{{ $item['link'] }}">
                                    {{ $item['title'] }}
                                </a>
                            </h2>

                            <div class="product-btns">
                                <a href="{{ $item['link'] }}" class="primary-btn add-to-cart">
                                    <i class="fa fa-search-plus"></i>
                                    View Product
                                </a>
                            </div>

                        </div>

                    </div>
                </div>

            @endforeach

        </div>

    </div>
</div>
<!-- /Featured Products Section -->@endsection