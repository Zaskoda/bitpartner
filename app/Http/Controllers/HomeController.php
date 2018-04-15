<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensor::where('user_id','=',\Auth::user()->id)->get();
        return view('home')->with(['sensors'=>$sensors]);
    }
}
