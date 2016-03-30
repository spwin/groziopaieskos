<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Facilities;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class FacilitiesController extends Controller
{
    public function index($category){
        $db_category = Categories::findOrFail($category);
        $facilities = Facilities::where(['category_id' => $category])->get();
        return view('categories.facilities.index')->with([
            'category' => $db_category,
            'facilities' => $facilities
        ]);
    }

    public function create($category){
        $db_category = Categories::findOrFail($category);
        return view('categories.facilities.create')->with([
            'category' => $db_category
        ]);
    }

    public function store($category, Request $request){
        $db_category = Categories::findOrFail($category);
        $input = $request->all();
        $input['category_id'] = $db_category->id;
        $facility = new Facilities();
        $facility->fill($input);
        $facility->save();
        Flash::success('Paslauga sėkmingai sukurta!');
        return Redirect::action('FacilitiesController@index', $db_category->id);
    }

    public function edit($id){
        $facility = Facilities::findOrFail($id);
        $category = Categories::findOrFail($facility->category_id);
        return view('categories.facilities.edit')->with([
            'category' => $category,
            'facility' => $facility
        ]);
    }

    public function update($id, Request $request)
    {
        $facility = Facilities::findOrFail($id);
        $input = $request->all();
        $facility->fill($input)->save();
        Flash::success('Paslauga sėkmingai pakeista!');
        return Redirect::action('FacilitiesController@index', $facility->category_id);
    }

    public function destroy($id){
        $facility = Facilities::findOrFail($id);
        $facility->delete();
        Flash::success('Paslauga sėkmingai pašalinta!');
        return Redirect::action('FacilitiesController@index', $facility->category_id);
    }
}
