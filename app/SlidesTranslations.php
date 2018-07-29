<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlidesTranslations extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slide_id', 'locale', 'name', 'title_desc', 'description', 'is_span', 'link', 'slug', 'short_name'
    ];
}
