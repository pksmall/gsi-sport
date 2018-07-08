<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Item extends Model
{
    protected $fillable = ['code', 'price', 'min_qty', 'qty', 'max_qty', 'store_subtract', 'status_store_id', 'views', 'sales', 'is_sale', 'duration_sale', 'duration_new', 'is_catalog', 'is_active', 'youtube', 'preview_id', 'whs_price', 'old_price'];

    public $statuses = ['Не активен', 'Активен'];

    public static function get_statuses()
    {
        $item = new Item();
        return $item->statuses;
    }

    public function locales()
    {
        return $this->hasMany(ItemTranslation::class, 'item_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ItemCategory::class, 'item_multi_categories',  'item_id', 'category_id');
    }

    public function recommended_items()
    {
        return $this->belongsToMany(Item::class, 'recommended_items', 'item_id', 'recommended_id');
    }

    public function characteristics()
    {
        return $this->hasMany(CharacteristicsChildTranslations::class, 'item_id', 'id')->where('locale', App::getLocale());
    }

    public function characteristics_without_locale()
    {
        return $this->hasMany(CharacteristicsChildTranslations::class, 'item_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Review::class, 'item_id', 'id');
    }

    public function active_comments()
    {
        return $this->hasMany(Review::class, 'item_id', 'id')->where('is_active', true);
    }

    public function active_comments_locale()
    {
        return $this->hasMany(Review::class, 'item_id', 'id')->where([['is_active', true], ['locale', App::getLocale()]]);
    }

    public function total_rating()
    {
        return $this->hasMany(Review::class, 'item_id', 'id')->where([['is_active', true]])->sum('rating');
    }

    public function terms()
    {
        return $this->belongsToMany(AttributeTerm::class, 'item_terms',  'item_id', 'term_id');
    }

    public function hasTerms($id_term)
    {
        return null !== $this->terms()->where('term_id', $id_term)->first();
    }

    public function sizes()
    {
        return $this->hasMany(CharacteristicsChildTranslations::class, 'item_id', 'id');
    }

    public function sizes_item()
    {
        return $this->hasMany(CharacteristicsChildTranslations::class, 'item_id', 'id')->where('ch_id', '=', 1);
    }

    public function preview()
    {
        return $this->hasOne(Image::class, 'id', 'preview_id');
    }

    public function gallery()
    {
        return $this->hasMany(ItemGallery::class, 'item_id', 'id');
    }

    public function gallery_photo1()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 1);
    }

    public function gallery_photo2()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 2);
    }

    public function gallery_photo3()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 3);
    }

    public function gallery_photo4()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 4);
    }

    public function gallery_photo5()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 5);
    }

    public function gallery_photo6()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 6);
    }

    public function gallery_photo7()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 7);
    }

    public function gallery_photo8()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 8);
    }

    public function gallery_photo9()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 9);
    }

    public function gallery_photo10()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 10);
    }

    public function gallery_photo11()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 11);
    }

    public function gallery_photo12()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 12);
    }

    public function gallery_photo13()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 13);
    }

    public function gallery_photo14()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 14);
    }

    public function gallery_photo15()
    {
        return $this->hasOne(ItemGallery::class, 'item_id', 'id')->where('position', '=', 15);
    }

    public function table_size()
    {
        return $this->belongsToMany(TableSize::class, 'item_table_sizes', 'item_id', 'table_id');
    }

    public function technologies()
    {
        return $this->hasMany(ItemTechnology::class, 'item_id', 'id');
    }
}
