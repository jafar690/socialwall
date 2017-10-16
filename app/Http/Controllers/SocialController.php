<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use Widop\HttpAdapter\CurlHttpAdapter;
use Widop\Twitter\OAuth\OAuthConsumer;
use Widop\Twitter\OAuth\Signature\OAuthHmacSha1Signature;
use Widop\Twitter\OAuth\OAuth;
use App\Instagrame;
use App\Facebook;
use Auth;
use Session;

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

    public function redirectToTwitter()
    {
        $oauth = new OAuth(
            new CurlHttpAdapter(),
            new OAuthConsumer(env('CONSUMER_KEY'), env('CONSUMER_SECRET')),
            new OAuthHmacSha1Signature()
        );
        $requestToken = $oauth->getRequestToken('http://127.0.0.1:8000/user/twitter/callback');
        Session::put('requestToken', $requestToken);
        $url = $oauth->getAuthorizeUrl($requestToken);

        return redirect($url);      
    }

    public function twitterCallback()
    {
        $oauth = new OAuth(
            new CurlHttpAdapter(),
            new OAuthConsumer(env('CONSUMER_KEY'), env('CONSUMER_SECRET')),
            new OAuthHmacSha1Signature()
        );

        $verifier = $_GET['oauth_verifier'];
        $requestToken = Session::get('requestToken');
        $accessToken = $oauth->getAccessToken($requestToken, $verifier);
        $key = array_pluck($accessToken, 'OAuthToken. -key');
        dd($key);
        return redirect(url('user/twitter'));
    }

    public function redirectToFacebook()
    {
        $provider = new \League\OAuth2\Client\Provider\Facebook([
            'clientId'          => env('FACEBOOK_APP_ID'),
            'clientSecret'      => env('FACEBOOK_APP_SECRET'),
            'redirectUri'       => 'http://127.0.0.1:8000/user/facebook/callback',
            'graphApiVersion'   => 'v2.10',
        ]);

        // If we don't have an authorization code then get one
        $authUrl = $provider->getAuthorizationUrl([
            'scope' => ['email', 'pages_show_list'],
        ]);
        $_SESSION['oauth2state'] = $provider->getState();
        
        return redirect($authUrl);      
    }

    public function FacebookCallback()
    {
        $provider = new \League\OAuth2\Client\Provider\Facebook([
            'clientId'          => env('FACEBOOK_APP_ID'),
            'clientSecret'      => env('FACEBOOK_APP_SECRET'),
            'redirectUri'       => 'http://127.0.0.1:8000/user/facebook/callback',
            'graphApiVersion'   => 'v2.10',
        ]);

        // Try to get an access token (using the authorization code grant)
        $token = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);
        // Optional: Now you have a token you can look up a users profile data
        try {

            // We got an access token, let's now get the user's details
            $user = $provider->getResourceOwner($token);
            dd($user);
            $facebook = new Facebook;
            $facebook->user_id = Auth::user()->id;
            $facebook->facebook_id = $user->getId();
            $facebook->facebook_username = $user->getName();
            $facebook->access_token = $token;
            $facebook->save();

        } catch (\Exception $e) {

            // Failed to get user details
            exit('Oh dear...');
        }
    }
}
