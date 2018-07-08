<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableSizeTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'table_id', 'locale', 'name', 'description'
    ];
}
