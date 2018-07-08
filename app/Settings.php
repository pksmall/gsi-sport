<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'title_ua',
        'title_en',
        'description',
        'description_ua',
        'description_en',
        'keywords',
        'keywords_ua',
        'keywords_en',
        'title_shop',
        'owner',
        'address',
        'address_ua',
        'address_en',
        'geocode',
        'email',
        'telephone',
        'open',
        'open_ua',
        'open_en'
    ];
}
