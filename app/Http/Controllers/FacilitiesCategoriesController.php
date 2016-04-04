<?php

namespace App\Http\Controllers;

use App\Categories;
use App\FacilitiesCategories;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class FacilitiesCategoriesController extends Controller
{
    public function index(){
        $categories = FacilitiesCategories::orderBy('order', 'ASC')->get();
        return view('categories.facilities_categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create(){
        $categories = Categories::lists('name_plural', 'id');
        return view('categories.facilities_categories.create')->with([
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $input = $request->all();
        if ($request->file('image')->isValid()) {
            $destinationPath = 'uploads';
            $fileName = rand(11111,99999).$request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = 'no_image.png';
        }
        $category = new FacilitiesCategories();
        $category->fill($input);
        $category->save();
        Flash::success('Kategorija sėkmingai sukurta!');
        return Redirect::action('FacilitiesCategoriesController@index');
    }

    public function edit($id){
        $category = FacilitiesCategories::findOrFail($id);
        $categories = Categories::lists('name_plural', 'id');
        return view('categories.facilities_categories.edit')->with([
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function update($id, Request $request)
    {
        $category = FacilitiesCategories::findOrFail($id);
        $input = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = 'uploads';
            $fileName = rand(11111,99999).$request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = 'no_image.png';
        }
        $category->fill($input)->save();
        return Redirect::action('FacilitiesCategoriesController@index');
    }

    public function destroy($id){
        $category = FacilitiesCategories::findOrFail($id);
        $category->delete();
        Flash::success('Kategorija sėkmingai pašalinta!');
        return Redirect::action('FacilitiesCategoriesController@index');
    }
}
