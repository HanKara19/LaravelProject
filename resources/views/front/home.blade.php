@extends('layouts.master')

@section('slider')
     @include('front.slider')
@endsection

@section('content')
     <h2> {{ $message }} </h2> 
@endsection