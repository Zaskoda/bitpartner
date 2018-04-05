<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyAverage;

class DailyAverageController extends Controller
{
    public function index()
    {
        DailyAverage::generate();
        $readings = DailyAverage::orderBy('id','desc')->paginate(90);
        return view('daily')->with(['readings'=>$readings]);
    }

}
