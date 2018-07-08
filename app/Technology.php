<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'category_id', 'preview_id', 'is_active'
    ];

    public function locales()
    {
        return $this->hasMany(TechnologiesTranslation::class, 'technology_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(TechnologiesCategory::class, 'id', 'category_id');
    }

    public function preview()
    {
        return $this->hasOne(Image::class, 'id', 'preview_id');
    }

    public function gallery()
    {
        return $this->hasMany(TechnologyGallery::class, 'technology_id', 'id');
    }

    public function gallery_photo1()
    {
        return $this->hasOne(TechnologyGallery::class, 'technology_id', 'id')->where('position', '=', 1);
    }

    public function gallery_photo2()
    {
        return $this->hasOne(TechnologyGallery::class, 'technology_id', 'id')->where('position', '=', 2);
    }

    public function gallery_photo3()
    {
        return $this->hasOne(TechnologyGallery::class, 'technology_id', 'id')->where('position', '=', 3);
    }

    public function gallery_photo4()
    {
        return $this->hasOne(TechnologyGallery::class, 'technology_id', 'id')->where('position', '=', 4);
    }

    public function gallery_photo5()
    {
        return $this->hasOne(TechnologyGallery::class, 'technology_id', 'id')->where('position', '=', 5);
    }
}
