<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name_single', 'name_plural', 'slug', 'image', 'order'
    ];

    public function getFacilities(){
        return $this->hasMany('App\Facilities', 'category_id', 'id');
    }

    public function getOrganizations(){
        return $this->hasMany('App\Organization', 'category_id', 'id');
    }
}
