<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ICO extends Model
{
    //
    protected $table = 'icos';
    
    protected $fillable = [
        'title',
        'description',
        'accounce_link',
        'company_website',
        'company',
        'company_link',
        'start_date',
        'end_date'
    ];
}
