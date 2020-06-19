<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Photo;
use Illuminate\Support\Facades\DB;
use App\Album;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *w
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $photos =DB::table('photos')->latest('created_at')->get();
    
        return view('home')->with ('photos',$photos);  
    
    }
}
