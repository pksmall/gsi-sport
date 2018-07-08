<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecommendedItem extends Model
{
    protected $fillable = [
        'item_id', 'recommended_id'
    ];
}
