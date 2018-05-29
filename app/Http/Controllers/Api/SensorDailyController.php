<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Sensor;
use App\Reading;
use App\DailyAverage;

class SensorDailyController extends ApiController
{

    public function index(Request $request, $sensor_id)
    {
        DailyAverage::generate();
        $readings = DailyAverage::where('sensor_id','=',$sensor_id)
            ->orderBy('datestamp','desc')
            ->paginate();
        if ($readings) return $readings;
        abort(404, 'Sensor not found.');
    }

}
