<?php

namespace App;
use App\Reading;

use Illuminate\Database\Eloquent\Model;

class HourlyAverage extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'acc',
        'pressure',
        'soiltemp',
        'temperature',
        'moisture',
        'lux',
        'heading',
        'hourstamp',
        'reporter'
    ];

    //
    static function generate()
    {
        $avg_readings = Reading::select(
            \DB::raw('            
            reporter,
            avg(acc) as acc,
            avg(pressure) as pressure,
            avg(soiltemp) as soiltemp,
            avg(temperature) as temperature,
            avg(moisture) as moisture,
            avg(lux) as lux,
            avg(heading) as heading,
            date(timestamp) as datestamp,
            hour(timestamp) as hourstamp
            '))
        ->groupBy('reporter','datestamp','hourstamp')
        ->get();
        foreach ($avg_readings as $avg_reading) 
        {
            HourlyAverage::where('hourstamp','=',$avg_reading->hourstamp)->where('datestamp','=',$avg_reading->datestamp)->delete();
            HourlyAverage::create($avg_reading->toArray());
        }
    }
    
    function tempInF()
    {
        return round($this->temperature * (9/5) + 32, 2);
    }
}
