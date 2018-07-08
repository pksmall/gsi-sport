<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyGallery extends Model
{
    protected $fillable = ['technology_id', 'path', 'position'];
}
