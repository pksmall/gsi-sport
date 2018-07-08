<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'item_limit',
        'item_desc_length',
        'review_active',
        'review_guest',
        'review_notify',
        'exchange_rate',
        'duration_new'
    ];
}
