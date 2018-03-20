<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LastUpdated;

class Coin extends Model
{
    use LastUpdated;

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

    public function save(array $options = Array()) {
        $this->slug = $this->suggestSlug();
        return parent::save($options);
    }

    public function suggestSlug()
    {
        $slug = $this->cleanString($this->name);
        return $slug;
    }

    private function cleanString($string)
    {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', trim($string));
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
        return $clean;
    }

}
