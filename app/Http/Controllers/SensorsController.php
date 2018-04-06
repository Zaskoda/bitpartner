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
        return view('sensors')->with(['sensors'=>$sensors]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $sensor = Sensor::findOrFail($id);
        } else {
            $sensor = Sensor::where('name','=',$id)->firstOrFail();
        }
        return view('sensor')->with(['sensor'=>$sensor]);
    }

}
