<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyAverage;

class DailyAverageController extends Controller
{
    public function index(Request $request)
    {
        DailyAverage::generate();
        $readings = DailyAverage::orderBy('id','desc');
        if ($request->get('sensor')) {
            $readings = $readings->where('sensor_id',(int)$request->get('sensor'));
        }
        $readings = $readings->paginate(90);
        return view('daily')->with(['readings'=>$readings]);
    }

}
