<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;

class SensorsController extends Controller
{

    public function storeReading(Request $request)
    {
        $sensor = Sensor::where('api_key','=',$request->get('api_key'))->firstOrFail();
        $sensor->readings()->where('timestamp','=',$request->get('timestamp'))->delete();
        $reading = new Reading();
        $reading->sensor_id = $sensor->id;
        $reading->acc = $request->get('acc');
        $reading->pressure = $request->get('pressure');
        $reading->rgb = $request->get('rgb');
        $reading->soiltemp = $request->get('soiltemp');
        $reading->temperatue = $request->get('temperatue');
        $reading->moisture = $request->get('moisture');
        $reading->lux = $request->get('lux');
        $reading->heading = $request->get('heading');
        $reading->timestamp = $request->get('timestamp');
        $reading->save();
        return $reading;
    }

}
