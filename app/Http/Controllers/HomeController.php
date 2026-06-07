<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $title = 'Home Page xxxx';
    $message = 'Welcome to Laravel MVC example';

    $products = Product::where('status', 1)->latest()->get();

    return view('layouts.home', compact('title', 'message', 'products'));
}
    public function products()
    {
        $products = Product::where('status', 1)->get();
    
        return view('home.products', compact('products'));
    }
    
    public function productDetail($id)
    {
        $product = Product::with('images')->findOrFail($id);
    
        return view('home.product_detail', compact('product'));
    }
}