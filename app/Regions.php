<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    public function getCities(){
        return $this->hasMany('App\Cities', 'region_id', 'id');
    }
}
