<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    //
    protected $fillable = [
        'name',
        'symbol',
        'genesis_date',
        'website',
        'forked_from',
        'source',
        'summary',
        'description',
        'paper',
        'creator',
        'twitter',
        'reddit',
        'docs',
        'wikipedia',
        'logo'
    ];

    static function lastUpdated()
    {
        $recent = self::select('updated_at')->orderBy('updated_at','desc')->limit(1)->first();
        if ($recent) return $recent->updated_at;
        return null;
    }
}
