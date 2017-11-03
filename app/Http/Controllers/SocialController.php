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
use App\FacebookPages;
use App\Twitter;
use Auth;
use TwitterApi;
use Session;

class SocialController extends Controller
{
    public function facebook()
    {
        $facebook = Facebook::where('user_id', Auth::user()->id)->first();
    	return view('user.facebook')->withFacebook($facebook);
    }

    public function twitter()
    {
        $twitter = Twitter::where('user_id', Auth::user()->id)->first();
    	return view('user.twitter')->withTwitter($twitter);    	
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
        $key = $accessToken->getKey();
        $secret = $accessToken->getSecret();

        TwitterApi::reconfig([
            "consumer_key" => env('CONSUMER_KEY'),
            "consumer_secret"  => env('CONSUMER_SECRET'),
            "token" => $key,
            "secret" => $secret,
        ]);

        $user = TwitterApi::getCredentials();

        $twitter = new Twitter;
        $twitter->user_id = Auth::user()->id;
        $twitter->twitter_id = $user->id_str;
        $twitter->twitter_username = $user->screen_name;
        $twitter->access_token = $key;
        $twitter->access_token_secret = $secret;
        $twitter->save();

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
        
        try {
            $access_token = $provider->getLongLivedAccessToken($token);
        } catch (Exception $e) {
            echo 'Failed to exchange the token: '.$e->getMessage();
            exit();
        }

        $access_token->getToken();

        try {

            // We got an access token, let's now get the user's details
            $user = $provider->getResourceOwner($token);

        } catch (\Exception $e) {

            // Failed to get user details
            exit('Oh dear...');
        }

        $facebook = new Facebook;
        $facebook->user_id = Auth::user()->id;
        $facebook->facebook_id = $user->getId();
        $facebook->facebook_username = $user->getName();
        $facebook->access_token = $access_token;
        $facebook->longlived = true;
        $facebook->save();

        $baseUrl = 'https://graph.facebook.com/v2.10';
        $response = file_get_contents($baseUrl.'/me/accounts?'.'access_token='.$access_token);
        $data = json_decode($response, true);
        array_forget($data, 'paging');

        foreach($data['data'] as $page) {
            $fbpage = new FacebookPages;
            $fbpage->facebook_id = $facebook->id;
            $fbpage->page_id = $page['id'];
            \Log::info('loop2');
            $fbpage->page_name = $page['name'];
            $fbpage->access_token = $page['access_token'];
            $fbpage->save();
        }


        return redirect(url('user/facebook'));

    }
}
