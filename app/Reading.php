<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    
    public $timestamps = false;
    protected $fillable = [
        'id',
        'acc',
        'pressure',
        'rgb',
        'soiltemp',
        'temperature',
        'moisture',
        'lux',
        'heading',
        'timestamp',
        'reporter',
        'red',
        'green',
        'blue',
        'sensor_id'
    ];

    function tempInF()
    {
        return round($this->temperature * (9/5) + 32, 2);
    }

    static function mostRecentTimestamp()
    {
        $reading = self::select('timestamp')->orderBy('timestamp','desc')->limit(1)->first();
        if ($reading != null) return $reading->timestamp;
        return null;
    }

    public function sensor()
    {
        return $this->hasOne('App\Sensor','id','sensor_id');
    }

    public function timeSince()
    {
        date_default_timezone_set("US/Pacific"); 
        $time = strtotime($this->timestamp);
        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
        return "out of time";
    }

}
