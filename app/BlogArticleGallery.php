<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogArticleGallery extends Model
{
    protected $fillable = ['article_id', 'path', 'position'];
}
