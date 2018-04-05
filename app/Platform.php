<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LastUpdated;

class Platform extends Model
{
    use LastUpdated;
    
    protected $fillable = [
        'name',
        'description',
        'link',
        'creator'
    ];
}
