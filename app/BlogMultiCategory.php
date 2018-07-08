<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogMultiCategory extends Model
{
    protected $fillable = [
        'article_id', 'category_id'
    ];
}
