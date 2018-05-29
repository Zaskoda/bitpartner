<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Sensor;
use App\Reading;
use App\HourlyAverage;

class SensorHourlyController extends ApiController
{
    const MAX_READINGS_PER_REQUEST = 500;
    const READINGS_PER_PAGE = 50;

    public function index(Request $request, $sensor_id)
    {
        HourlyAverage::generate();
        $readings = HourlyAverage::where('sensor_id','=',$sensor_id)
        ->orderBy('datestamp','desc')
        ->orderBy('hourstamp','desc');

        if ($request->get('from')) {
            $readings = $readings->where('datestamp', '>=', $request->get('from'));
            if ($request->get('to')) {
                $readings = $readings->where('datestamp', '<=', $request->get('to'));
            } 
            return $readings->limit(self::MAX_READINGS_PER_REQUEST)->get();

        }
        return $readings->paginate(self::READINGS_PER_PAGE);
    }


}
