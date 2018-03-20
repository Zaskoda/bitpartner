<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LastUpdated;

class Page extends Model
{
    use LastUpdated;
    
    protected $fillable = [
        'slug',
        'title',
        'body'
    ];

}
