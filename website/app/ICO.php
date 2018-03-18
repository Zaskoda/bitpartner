<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LastUpdated;

class ICO extends Model
{
    use LastUpdated;
    
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
