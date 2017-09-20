<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use App\Instagrame;
use Auth;

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
        $instagram = Instagrame::where('user_id', Auth::user()->id)->first();

    	return view('user.instagram')->withInstagram($instagram);    	
    }

    public function redirectToIsnstagram()
    {
        $instagram = new Instagram(array(
            'apiKey'      => env('INSTAGRAM_APP_KEY'),
            'apiSecret'   => env('INSTAGRAM_APP_SECRET'),
            'apiCallback' => env('INSTAGRAM_APP_CALLBACK'),
        ));


        return redirect($instagram->getLoginUrl());      
    }

    public function InstagramCallback()
    {
        $instagram = new Instagram(array(
            'apiKey'      => env('INSTAGRAM_APP_KEY'),
            'apiSecret'   => env('INSTAGRAM_APP_SECRET'),
            'apiCallback' => env('INSTAGRAM_APP_CALLBACK'),
        ));

        // grab OAuth callback code
        $code = $_GET['code'];
        $data = $instagram->getOAuthToken($code);
        $instagram = new Instagrame;
        $instagram->user_id = Auth::user()->id;
        $instagram->instagram_id = $data->user->id;
        $instagram->instagram_username = $data->user->username;
        $instagram->access_token = $data->access_token;
        $instagram->save();

        return redirect(url('user/instagram'));
    }
}
