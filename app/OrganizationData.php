<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_data';

    protected $fillable = [
        'imones_kodas', 'pvm_kodas', 'website', 'name', 'pavarde', 'ind_veikl_nr'
    ];

    public function getOrganization(){
        return $this->hasOne('App\Organization', 'organization_data_id', 'id');
    }

}
