<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $msg = "<p>Stay tuned for a list of blockchain platforms, coming soon... </p>";
        return view('content')->with(['content'=> $msg]);
    }

}
