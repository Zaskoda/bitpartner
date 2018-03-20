<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DailyAverage;

class DailyAverageController extends AdminController
{
    public function update()
    {        
        DailyAverage::generate(true);
        return redirect('/monitor/daily');
    }
}
