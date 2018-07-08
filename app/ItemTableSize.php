<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTableSize extends Model
{
    protected $fillable = [
        'item_id', 'table_id'
    ];
}
