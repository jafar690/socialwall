<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facebook;
use App\FacebookPages;
use App\Instagrame;
use App\Twitter;
use Auth;

class WallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facebook = Facebook::where('user_id', Auth::user()->id)->first();
        $instagram = Instagrame::where('user_id', Auth::user()->id)->first();
        $twitter = Twitter::where('user_id', Auth::user()->id)->first();
        $pages = Facebook::find($facebook->id)->facebookpages;
        
        return view('user.wall.create', [
                    'pages' => $pages, 
                    'instagram' => $instagram, 
                    'twitter' => $twitter 
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
