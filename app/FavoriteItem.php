<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteItem extends Model
{
    protected $fillable = ['client_id', 'item_id'];
}
