<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeTermsTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'term_id', 'locale', 'name', 'slug'
    ];

    public function term()
    {
        return $this->hasOne(ItemTerms::class,  'id', 'term_id');
    }
}
