<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home Page xxxx';
        $message = 'Welcome to Laravel MVC example';
        
        
        return view('layouts.home', compact('title', 'message'));
    }
}