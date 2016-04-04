<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilitiesCategories extends Model
{
    protected $fillable = [
        'name', 'image', 'order', 'category_id'
    ];

    public function getFacilities(){
        return $this->hasMany('App\Facilities', 'facility_category_id', 'id');
    }

    public function getCategory(){
        return $this->hasOne('App\Categories', 'id', 'category_id');
    }
}
