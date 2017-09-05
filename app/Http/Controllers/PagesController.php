<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	return view('home');
    }

    public function plans()
    {
    	return view('plans');
    }

    public function contact()
    {
    	return view('contact');
    }
}
