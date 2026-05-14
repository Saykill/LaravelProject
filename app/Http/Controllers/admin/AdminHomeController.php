<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() : View
    { // <--- Açılış parantezi eksikti
        $title = 'Admin Home';
        $message = 'admin panel';

        return view('admin.index', compact('title', 'message'));
    } // <--- Kapanış parantezi eksikti
}
