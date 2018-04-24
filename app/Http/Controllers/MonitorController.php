<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reading;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $readings = Reading::orderBy('id','desc');
        if ($request->get('sensor')) {
            $readings = $readings->where('sensor_id',(int)$request->get('sensor'));
        }
        $readings = $readings->paginate(60);
        return view('monitor')->with(['readings'=>$readings]);
    }

    /**
     * Display last 10 resources
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        $readings = Reading::orderBy('id','desc')->paginate(10)->get();
        return $readings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Reading::where('timestamp','=',$request->get('timestamp'))->delete();
        $reading = new Reading($request->all());
        if ($request->get('reporter') == 'Sensor 01') {
            $reading->sensor_id = 2;
        }
        $reading->save();
        return $reading;
    }

}
