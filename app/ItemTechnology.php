<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTechnology extends Model
{
    public $timestamp = false;

    protected $fillable = [
        'item_id', 'technology_id'
    ];

    public function technology()
    {
        return $this->hasOne(Technology::class, 'id', 'technology_id');
    }
}
