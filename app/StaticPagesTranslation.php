<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPagesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'page_id', 'locale', 'name', 'slug', 'short_description', 'description', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    public function page()
    {
        return $this->hasOne(StaticPage::class, 'id', 'page_id');
    }
}
