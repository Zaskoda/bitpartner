<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LastUpdated;

class Article extends Model
{
    use LastUpdated;
    
    protected $fillable = [
        'slug',
        'title',
        'summary',
        'body',
        'publish_date',
        'user_id'
    ];

    public function author()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
