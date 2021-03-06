<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $fillable = [
        'name', 'category_id', 'facility_category_id'
    ];

    public function getCategory(){
        return $this->hasOne('App\Categories', 'id', 'category_id');
    }

    public function getOrganization(){
        return $this->belongsToMany('App\Organizations', 'organizations_facilities', 'facility_id');
    }

    public function getFacilityCategory(){
        return $this->hasOne('App\FacilitiesCategories', 'id', 'facility_category_id');
    }
}
