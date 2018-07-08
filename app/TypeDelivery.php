<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDelivery extends Model
{
    public function locales()
    {
        return $this->hasMany(TypeDeliveriesTranslation::class, 'delivery_id', 'id');
    }
}
