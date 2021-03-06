<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LastUpdated;

class Job extends Model
{
    use LastUpdated;
    
    protected $fillable = [
        'title',
        'source',
        'description',
        'company',
        'company_link',
        'location',
        'post_date'
    ];

}
