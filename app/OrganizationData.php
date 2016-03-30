<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationData extends Model
{
    protected $fillable = [
        'imones_kodas', 'pvm_kodas', 'website', 'name', 'pavarde', 'ind_veikl_nr'
    ];

}
