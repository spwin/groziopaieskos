<?php

use App\Categories;

class Helper{

    public static function categories(){
        $categories = Categories::with('getOrganizations')->get();
        return $categories;
    }

}