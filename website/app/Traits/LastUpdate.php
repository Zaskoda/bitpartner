<?php

namespace App\Traits;

trait LastUpdate {
   
    static function lastUpdated()
    {
        $recent = self::select('updated_at')->orderBy('updated_at','desc')->limit(1)->first();
        if ($recent) return $recent->updated_at;
        return null;
    } 
}