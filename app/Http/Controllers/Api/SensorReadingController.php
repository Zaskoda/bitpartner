<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Sensor;
use App\Reading;

class SensorReadingController extends ApiController
{

    public function index(Request $request, $sensor_id)
    {
        $readings = Reading::where('sensor_id','=',$sensor_id)
            ->orderBy('timestamp','desc')
            ->paginate();
        if ($readings) return $readings;
        abort(404, 'Sensor not found.');
    }

}
