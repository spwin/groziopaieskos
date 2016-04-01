<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'title', 'phone', 'address', 'logo', 'approved', 'type', 'description', 'category_id', 'city_id', 'opening_time_id', 'email', 'place', 'organization_data_id'
    ];

    public function getCategory(){
        return $this->hasOne('App\Categories', 'id', 'category_id');
    }

    public function getCity(){
        return $this->hasOne('App\Cities', 'id', 'city_id');
    }

    public function getOpeningTimes(){
        return $this->hasOne('App\OpeningTimes', 'id', 'opening_time_id');
    }

    public function getOrganizationData(){
        return $this->hasOne('App\OrganizationData', 'id', 'organization_data_id');
    }

    public function getFacilities(){
        return $this->belongsToMany('App\Facilities', 'organizations_facilities', 'organization_id');
    }
}
