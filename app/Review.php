<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'review', 'rating', 'locale', 'is_active'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
