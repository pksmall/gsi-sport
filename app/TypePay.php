<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePay extends Model
{
    public function locales()
    {
        return $this->hasMany(TypePaysTranslation::class, 'pay_id', 'id');
    }
}
