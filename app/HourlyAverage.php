<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reading;

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
        'datestamp',
        'sensor_id',
        'lowtemp',
        'hightemp',
    ];

    //
    static function generate($all=false)
    {
        $mostRecent = self::mostRecentTimestamp();

        $avg_readings = Reading::select(
            \DB::raw('            
            sensor_id,
            avg(acc) as acc,
            avg(pressure) as pressure,
            avg(soiltemp) as soiltemp,
            avg(temperature) as temperature,
            min(temperature) as lowtemp,
            max(temperature) as hightemp,
            avg(moisture) as moisture,
            avg(lux) as lux,
            avg(heading) as heading,
            date(timestamp) as datestamp,
            hour(timestamp) as hourstamp
            '))
        ->groupBy('sensor_id','datestamp','hourstamp');

        if (($mostRecent != null) and (!$all)) {
            $avg_readings = $avg_readings->
                where('timestamp','>',\DB::RAW('DATE_SUB("'.$mostRecent.'",INTERVAL 2 HOUR)'));
        }

        $avg_readings = $avg_readings->get();
        foreach ($avg_readings as $avg_reading) 
        {   
            HourlyAverage::where('hourstamp','=',$avg_reading->hourstamp)->where('datestamp','=',$avg_reading->datestamp)->delete();
            HourlyAverage::create($avg_reading->toArray());
        }

    }

    static function mostRecentTimestamp()
    {
        $reading = self::select('datestamp')->orderBy('datestamp','desc')->limit(1)->first();
        if ($reading != null) return $reading->datestamp;
        return null;
    }
    
    function tempInF()
    {
        return round($this->temperature * (9/5) + 32, 2);
    }
    
    public function sensor()
    {
        return $this->hasOne('App\Sensor','id','sensor_id');
    }
}
