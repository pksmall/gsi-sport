<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePaysTranslation extends Model
{
    public $timestamps = false;

    public function pay()
    {
        return $this->hasMany(TypePay::class,  'id', 'pay_id');
    }
}
