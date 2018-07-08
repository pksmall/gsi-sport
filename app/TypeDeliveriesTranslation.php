<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDeliveriesTranslation extends Model
{
    public $timestamps = false;

    public function delivery()
    {
        return $this->hasMany(TypeDelivery::class,  'id', 'delivery_id');
    }
}
