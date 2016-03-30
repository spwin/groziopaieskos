<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'title', 'phone', 'address', 'logo', 'approved', 'type', 'description', 'category_id', 'city_id', 'opening_time_id'
    ];

    public function getCategory(){
        $this->hasOne('App\Categories', 'id', 'category_id');
    }

    public function getCity(){
        $this->hasOne('App\Cities', 'id', 'city_id');
    }

    public function getOpeningTimes(){
        $this->hasOne('App\OpeningTimes', 'id', 'opening_time_id');
    }

    public function getFacilities(){
        $this->belongsToMany('App\Facilities', 'organizations_facilities', 'organization_id');
    }
}
