<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HourlyAverage;

class HourlyAverageController extends Controller
{
    public function index()
    {
        HourlyAverage::generate();
        $readings = HourlyAverage::orderBy('id','desc')->paginate(168);
        return view('hourly')->with(['readings'=>$readings]);
    }

}
