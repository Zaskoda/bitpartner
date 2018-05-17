<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class DashController extends Controller
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
        $sensors = Sensor::orderBy('id','desc')->where('user_id','=',\Auth::user()->id)->get();
        return view('dash')->with(['sensors'=>$sensors]);
    }
}
