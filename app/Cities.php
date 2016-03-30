<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'name', 'slug', 'region_id'
    ];

    public function getRegion(){
        return $this->hasOne('App\Regions', 'id', 'region_id');
    }

    public function getJunctions(){
        return $this->hasMany('App\Junctions', 'city_id', 'id');
    }

    public function getOrganizations(){
        return $this->hasMany('App\Organizations', 'city_id', 'id');
    }
}
