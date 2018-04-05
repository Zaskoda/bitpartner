<?php

namespace App;
use App\Reading;

use Illuminate\Database\Eloquent\Model;

class DailyAverage extends Model
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
        'datestamp',
        'reporter'
    ];

    //
    static function generate($all = false)
    {
        $mostRecent = Reading::mostRecentTimestamp();

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
            date(timestamp) as datestamp
            '))
        ->groupBy('reporter','datestamp');

        if (($mostRecent != null) and (!$all)) {
            $avg_readings = $avg_readings->
                where('timestamp','>',\DB::RAW('DATE_SUB("'.$mostRecent.'",INTERVAL 2 DAY)'));
        }

        $avg_readings = $avg_readings->get();
        foreach ($avg_readings as $avg_reading) 
        {
            DailyAverage::where('datestamp','=',$avg_reading->datestamp)->delete();
            DailyAverage::create($avg_reading->toArray());
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
}
