<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttributesTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'attribute_id', 'locale', 'name', 'slug'
    ];
}
