<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpRegions extends Model
{
    protected $fillable = [
        'name',
        'nameru',
        'regionref',
        'capitalregionref'
    ];
}
