<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTerms extends Model
{
    protected $fillable = [
        'item_id', 'term_id'
    ];
}
