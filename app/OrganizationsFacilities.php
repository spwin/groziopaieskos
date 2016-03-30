<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationsFacilities extends Model
{
    protected $fillable = [
        'organization_id', 'facility_id'
    ];
}
