<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $fillable = [
        'image_id', 'active_title', 'active_breadcrumbs', 'views', 'is_menu', 'is_second_menu', 'is_footer_menu', 'sort_order', 'is_active'
    ];

    public function locales()
    {
        return $this->hasMany(StaticPagesTranslation::class, 'page_id', 'id');
    }
}
