<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Junctions extends Model
{
    protected $fillable = [
        'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
    ];
}
