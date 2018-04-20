<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HourlyAverage;

class HourlyAverageController extends Controller
{
    public function index(Request $request)
    {
        HourlyAverage::generate();
        $readings = HourlyAverage::orderBy('id','desc');
        if ($request->get('sensor')) {
            $readings = $readings->where('sensor_id',(int)$request->get('sensor'));
        }
        $readings = $readings->paginate(168);
        return view('hourly')->with(['readings'=>$readings]);
    }

}
