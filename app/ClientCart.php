<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCart extends Model
{
    protected $fillable = [
        'client_id',
        'item_id',
        'qty',
        'size'
    ];

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
