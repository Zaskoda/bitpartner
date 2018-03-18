<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'title',
        'source',
        'description',
        'company',
        'company_website',
        'location',
        'post_date'
    ];

}
