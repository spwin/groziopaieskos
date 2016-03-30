<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Cities;
use App\Regions;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class FrontendController extends Controller
{
    public function company(){
        $categories = Categories::with('getFacilities')->get();
        $regions = Regions::lists('name', 'id');
        $cities = Cities::lists('name', 'id');
        return view('frontend.registration.company')->with([
            'categories' => $categories,
            'regions' => $regions,
            'cities' => $cities
        ]);
    }

    public function autocomplete(){
        $term = Input::get('term');
        $results = array();

        $queries = DB::table('places')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        }
        return Response::json($results);
    }

    public function store($type, Request $request){
        echo 'TYPE: '.$type.'<br/>';
        $input = $request->all();
        echo '<pre>';
        print_r($input);
        echo '</pre>';
    }
}
