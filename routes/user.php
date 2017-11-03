<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.home');
})->name('home');

Route::get('/facebook', 'SocialController@facebook')->name('facebook');
Route::get('/twitter', 'SocialController@twitter')->name('twitter');
Route::get('/instagram', 'SocialController@instagram')->name('instagram');

Route::get('/instagram/auth/', 'SocialController@redirectToIsnstagram');
Route::get('/instagram/callback/', 'SocialController@InstagramCallback');

Route::get('/twitter/auth/', 'SocialController@redirectToTwitter');
Route::get('/twitter/callback/', 'SocialController@twitterCallback');

Route::get('/facebook/auth/', 'SocialController@redirectToFacebook');
Route::get('/facebook/callback/', 'SocialController@FacebookCallback');

Route::resource('/wall', 'WallsController');

