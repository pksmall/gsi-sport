<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpWarehouses extends Model
{
    protected $fillable = [
        'description',
        'descriptionru',
        'shortaddress',
        'shortaddressru',
        'typeofwarehouse',
        'ref',
        'number',
        'cityref',
        'citydescription',
        'citydescriptionru',
        'warehousestatus'
    ];
}
