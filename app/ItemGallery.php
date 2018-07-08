<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemGallery extends Model
{
    protected $fillable = ['item_id', 'path', 'position'];
}
