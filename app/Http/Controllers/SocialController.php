<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function facebook()
    {
    	return view('user.facebook');
    }

    public function twitter()
    {
    	return view('user.twitter');    	
    }

    public function instagram()
    {
    	return view('user.instagram');    	
    }
}
