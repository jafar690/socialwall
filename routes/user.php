<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.home');
})->name('home');

Route::get('/facebook', 'SocialController@facebook');
Route::get('/twitter', 'SocialController@twitter');
Route::get('/instagram', 'SocialController@instagram');

Route::resource('/wall', 'WallsController');

