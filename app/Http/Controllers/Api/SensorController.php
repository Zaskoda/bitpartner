<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Sensor;
use App\Reading;

class SensorController extends ApiController
{
    public function index()
    {
        $sensors = Sensor::all();
        return $sensors;
    }

    public function show(Request $request, $id)
    {
        if (is_numeric($id)) {
            $sensor = Sensor::where('id','=',$id)->with(['readings'=>function($query) {
                    $query->orderBy('timestamp','desc')
                        ->paginate(80);
                }])->firstOrFail();
            if ($sensor) return $sensor;
        }
        abort(404, 'Sensor not found.');
    }

    public function storeReading(Request $request)
    {
        $sensor = Sensor::where('api_token','=',$request->get('api_token'))->firstOrFail();
        $sensor->readings()->where('timestamp','=',$request->get('timestamp'))->delete();
        $reading = new Reading();
        $reading->sensor_id = $sensor->id;

        $reading->acc = $request->get('acc');
        $reading->pressure = $request->get('pressure');
        $reading->rgb = $request->get('rgb');
        $reading->red = $request->get('red');
        $reading->green = $request->get('green');
        $reading->blue = $request->get('blue');
        $reading->soiltemp = $request->get('soiltemp');
        $reading->temperature = $request->get('temperature');
        $reading->moisture = $request->get('moisture');
        $reading->lux = $request->get('lux');
        $reading->heading = $request->get('heading');
        $reading->timestamp = $request->get('timestamp');

        $reading->save();
        return $reading;
    }

}
