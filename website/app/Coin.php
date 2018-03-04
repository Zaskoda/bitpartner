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
        'description'
    ];
}
