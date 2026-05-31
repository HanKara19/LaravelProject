<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    
    @section('head')
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />

    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/slick-theme.css" />

    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/nouislider.min.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/style.css" />

    @show
</head>
<body>
@section('header')
    @include('front.header')
@show
@include('front.menu')

@yield('slider')

<div class="container">
    @yield('content')
</div>

@section('footer')
    @include('front.footer')
@show
</body>
</html>