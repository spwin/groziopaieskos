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

    public static function url($title){
        $chars = [
            'ą' => 'a',
            'Ą' => 'A',
            'č' => 'c',
            'Č' => 'C',
            'ę' => 'e',
            'Ę' => 'E',
            'ė' => 'e',
            'Ė' => 'E',
            'į' => 'i',
            'Į' => 'I',
            'š' => 's',
            'Š' => 'S',
            'ų' => 'u',
            'Ų' => 'U',
            'ū' => 'u',
            'Ū' => 'U',
            'ž' => 'z',
            'Ž' => 'Z'
        ];
        foreach($chars as $old => $new){
            $title = str_replace($old, $new, $title);
        }
        $title = preg_replace("/[^A-Za-z0-9 ]/", '-', $title);
        return $title;
    }

}