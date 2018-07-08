<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologiesCategoriesTranslation extends Model
{
    protected $table = 'tech_c_translations';

    public $timestamps = false;

    protected $fillable = [
        'name', 'technologies_category_id', 'locale', 'description', 'slug'
    ];

    public function category()
    {
        return $this->hasOne(TechnologiesCategory::class,  'id', 'technologies_category_id');
    }
}
