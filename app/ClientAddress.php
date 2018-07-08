<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAddress extends Model
{
    protected $fillable = [
        'client_id',
        'type_id',
        'country',
        'region',
        'city',
        'address',
        'address_detail',
        'zipcode',
        'delivery_id'
    ];
}
