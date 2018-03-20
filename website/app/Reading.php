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
        'reporter'
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
}
