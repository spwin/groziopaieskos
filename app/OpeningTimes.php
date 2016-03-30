<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningTimes extends Model
{
    protected $fillable = [
        'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
    ];

    public function getMonday(){
        return $this->hasOne('App\Days', 'id', 'monday');
    }

    public function getTuesday(){
        return $this->hasOne('App\Days', 'id', 'tuesday');
    }

    public function getWednesday(){
        return $this->hasOne('App\Days', 'id', 'wednesday');
    }

    public function getThursday(){
        return $this->hasOne('App\Days', 'id', 'thursday');
    }

    public function getFriday(){
        return $this->hasOne('App\Days', 'id', 'friday');
    }

    public function getSaturday(){
        return $this->hasOne('App\Days', 'id', 'saturday');
    }

    public function getSunday(){
        return $this->hasOne('App\Days', 'id', 'sunday');
    }

    public function getOrganizations(){
        return $this->hasMany('App\Organizations', 'opening_time_id', 'id');
    }
}
