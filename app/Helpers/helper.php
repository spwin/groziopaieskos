<?php

use App\Categories;
use \App\Regions;

class Helper{

    public static function categories(){
        $categories = Categories::with('getOrganizations')->get();
        return $categories;
    }

    public static function regions(){
        $regions = Regions::with('getCities')->get();
        return $regions;
    }

}