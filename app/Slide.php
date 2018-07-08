<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'sort_order', 'attach_id', 'is_active'
    ];

    public function locales()
    {
        return $this->hasMany(SlidesTranslations::class, 'slide_id', 'id');
    }

    public function slide_asset()
    {
        return $this->hasOne(Image::class,  'id', 'attach_id');
    }
}
