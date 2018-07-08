<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{

    protected $fillable = [
        'is_active', 'term_id', 'preview_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_multi_categories', 'article_id', 'category_id');
    }

    public function locales()
    {
        return $this->hasMany(BlogArticlesTranslation::class, 'article_id', 'id');
    }

    public function recommended_items()
    {
        return $this->belongsToMany(Item::class, 'item_terms', 'item_id', 'term_id');
    }

    public function preview()
    {
        return $this->hasOne(Image::class, 'id', 'preview_id');
    }

    public function gallery()
    {
        return $this->hasMany(BlogArticleGallery::class, 'article_id', 'id');
    }

    public function gallery_photo1()
    {
        return $this->hasOne(BlogArticleGallery::class, 'article_id', 'id')->where('position', '=', 1);
    }

    public function gallery_photo2()
    {
        return $this->hasOne(BlogArticleGallery::class, 'article_id', 'id')->where('position', '=', 2);
    }

    public function gallery_photo3()
    {
        return $this->hasOne(BlogArticleGallery::class, 'article_id', 'id')->where('position', '=', 3);
    }

    public function gallery_photo4()
    {
        return $this->hasOne(BlogArticleGallery::class, 'article_id', 'id')->where('position', '=', 4);
    }

    public function gallery_photo5()
    {
        return $this->hasOne(BlogArticleGallery::class, 'article_id', 'id')->where('position', '=', 5);
    }
}
