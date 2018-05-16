<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensor::orderBy('name','desc')->paginate(40);
        return view('sensors')->with(['sensors'=>$sensors, 'title'=>'RPI Mine Monitor Sensors']);
    }

    public function show($id)
    {
        $sensor = Sensor::where('id',(int) $id)->where('user_id',\Auth::user()->id)->firstOrFail();
        return view('sensor')->with(['sensor'=>$sensor,'title' => $sensor->name.' - Bit Partner']);
    }

    public function store(Request $request)
    {
        $sensor = new Sensor($request->all());
        $sensor->user_id = \Auth::user()->id;
        if (!$sensor->save()) {
            return back()->with('error', 'Unable to save sensor');
        }
        $sensor->refreshToken();
        return back()->with('success', 'Sensor #'.$sensor->id.' has been added.');
    }
}
