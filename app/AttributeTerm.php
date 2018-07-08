<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeTerm extends Model
{
    protected $fillable = [
        'is_filter', 'sort_id', 'sort_order', 'attribute_id', 'is_active'
    ];

    protected $casts = [
        'only_categories' => 'array'
    ];

    protected $typeSort = [
        'По возрастанию',
        'По убыванию'
    ];

    public function getTypeSort($id)
    {
        return $this->typeSort[$id];
    }

    public function locales()
    {
        return $this->hasMany(AttributeTermsTranslation::class, 'term_id', 'id');
    }
}
