<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCharacteristicsTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ch_id', 'locale', 'name', 'slug'
    ];
}
