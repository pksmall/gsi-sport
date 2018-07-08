<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacteristicsChildTranslations extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_id', 'ch_id', 'locale', 'value'
    ];

//    protected $casts = [
//        'value' => 'array',
//    ];

    public function parent()
    {
        return $this->hasMany(ItemCharacteristicsTranslation::class, 'ch_id', 'ch_id');
    }
}
