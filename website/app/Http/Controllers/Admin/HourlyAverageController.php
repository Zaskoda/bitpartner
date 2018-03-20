<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\HourlyAverage;

class HourlyAverageController extends AdminController
{
    public function update()
    {        
        HourlyAverage::generate(true);
        return redirect('/monitor/hourly');
    }
}
