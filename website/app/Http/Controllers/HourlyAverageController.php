<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HourlyAverage;

class HourlyAverageController extends Controller
{
    public function index()
    {
        $readings = HourlyAverage::orderBy('id','desc')->paginate(96);
        return view('hourly')->with(['readings'=>$readings]);
    }

    public function update()
    {
        if (!$this->checkRole()) return \Redirect::route('coins.index');
        
        HourlyAverage::generate();
        return redirect('hourly');
    }
}
