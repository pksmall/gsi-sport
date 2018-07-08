<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends Model
{
    protected $fillable = [
        'is_filter', 'sort_id', 'sort_order', 'only_categories', 'is_active'
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

    public function terms()
    {
        return $this->hasMany(AttributeTerm::class, 'attribute_id', 'id')->paginate(10);
    }

    public function terms_list()
    {
        return $this->hasMany(AttributeTerm::class, 'attribute_id', 'id');
    }

    public function locales()
    {
        return $this->hasMany(ItemAttributesTranslation::class, 'attribute_id', 'id');
    }
}
