<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlidesTranslations extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slide_id', 'locale', 'name', 'description', 'link', 'slug'
    ];
}
