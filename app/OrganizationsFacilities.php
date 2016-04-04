<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationsFacilities extends Model
{
    protected $fillable = [
        'organization_id', 'facility_id'
    ];

    public function getOrganization(){
        return $this->hasOne('App\Organizations', 'id', 'organization_id');
    }

    public function getFacility(){
        return $this->hasOne('App\Facilities', 'id', 'facility_id');
    }
}
