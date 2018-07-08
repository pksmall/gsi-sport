<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCharacteristic extends Model
{
    protected $fillable = [
        'sort_id', 'sort_order', 'is_active'
    ];

    protected $typeSort = [
        'По возрастанию',
        'По убыванию'
    ];

    public function getTypeSort($id)
    {
        return $this->typeSort[$id];
    }

    public function locales()
    {
        return $this->hasMany(ItemCharacteristicsTranslation::class, 'ch_id', 'id');
    }
}
