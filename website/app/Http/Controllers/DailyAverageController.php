<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyAverage;

class DailyAverageController extends Controller
{
    public function index()
    {
        DailyAverage::generate();
        $readings = DailyAverage::orderBy('id','desc')->paginate(60);
        return view('daily')->with(['readings'=>$readings]);
    }

    public function update()
    {
        if (!$this->checkRole()) return \Redirect::route('coins.index');
        
        DailyAverage::generate(true);
        return redirect('daily');
    }
}
