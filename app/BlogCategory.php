<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'parent_id', 'is_active', 'sort_order'
    ];

    public function articles()
    {
        return $this->belongsToMany(BlogArticle::class, 'blog_multi_categories', 'category_id', 'article_id');
    }

    public function subcategories()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id', 'id');
    }

    public function locales()
    {
        return $this->hasMany(BlogCategoriesTranslation::class, 'category_id', 'id');
    }
}
