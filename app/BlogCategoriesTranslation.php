<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategoriesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category_id', 'locale', 'name', 'slug', 'description'
    ];

    public function category()
    {
        return $this->hasOne(BlogCategory::class,  'id', 'category_id');
    }
}
