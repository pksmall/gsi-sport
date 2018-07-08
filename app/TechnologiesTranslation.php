<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologiesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'slug', 'short_description', 'description', 'technology_id', 'locale'
    ];

    public function item()
    {
        return $this->hasOne(Technology::class,  'id', 'technology_id');
    }
}
