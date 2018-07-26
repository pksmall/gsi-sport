<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'item_id', 'qty'];

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
