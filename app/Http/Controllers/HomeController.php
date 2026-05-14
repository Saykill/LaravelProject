<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    public function index(): view
    {
        $title = 'Home Page';
        $message = 'Welcome to Laravel MVC example';
        return view('front.home', compact('title', 'message'));
    }
}
