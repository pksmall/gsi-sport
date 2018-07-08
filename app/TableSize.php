<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableSize extends Model
{
    protected $fillable = ['is_active'];

    public function locales()
    {
        return $this->hasMany(TableSizeTranslation::class, 'table_id', 'id');
    }
}
