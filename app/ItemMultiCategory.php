<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMultiCategory extends Model
{
    protected $fillable = [
        'item_id', 'category_id'
    ];
}
