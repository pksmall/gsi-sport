<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpCities extends Model
{
    protected $fillable = [
        'name',
        'nameru',
        'ref',
        'regionref',
        'settlementtype',
        'isbranch',
        'cityid',
        'settlementtypedesc',
        'settlementtypedescru'
    ];
}
