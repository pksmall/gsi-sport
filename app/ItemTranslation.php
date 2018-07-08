<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_id', 'locale', 'name', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    public function item()
    {
        return $this->hasOne(Item::class,  'id', 'item_id');
    }
}