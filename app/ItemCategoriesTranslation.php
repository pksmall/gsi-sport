<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategoriesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category_id', 'locale', 'name', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keywords'
    ];
}
