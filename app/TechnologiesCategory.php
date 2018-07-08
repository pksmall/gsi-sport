<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologiesCategory extends Model
{
    protected $fillable = [
        'parent_id', 'is_active'
    ];

    public function locales()
    {
        return $this->hasMany(TechnologiesCategoriesTranslation::class, 'technologies_category_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(TechnologiesCategory::class, 'id', 'parent_id');
    }

    public function subcategory()
    {
        return $this->hasMany(TechnologiesCategory::class, 'parent_id', 'id');
    }

    public function technologies()
    {
        return $this->hasMany(Technology::class,'category_id','id');
    }
}
