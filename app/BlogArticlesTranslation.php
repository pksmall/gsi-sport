<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogArticlesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'article_id', 'locale', 'name', 'slug', 'short_description', 'description', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    public function post()
    {
        return $this->hasOne(BlogArticle::class,   'id', 'article_id');
    }
}
