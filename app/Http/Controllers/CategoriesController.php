<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::orderBy('order', 'ASC')->get();
        return view('categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('categories.create');
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
        $category = new Categories();
        $category->fill($input);
        $category->save();
        Flash::success('Kategorija sėkmingai sukurta!');
        return Redirect::action('CategoriesController@index');
    }

    public function edit($id){
        $category = Categories::findOrFail($id);
        return view('categories.edit')->with([
            'category' => $category
        ]);
    }

    public function update($id, Request $request)
    {
        $category = Categories::findOrFail($id);
        $input = $request->all();
        if ($request->has('image') && $request->file('image')->isValid()) {
            $destinationPath = 'uploads';
            $fileName = rand(11111,99999).$request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = 'no_image.png';
        }
        $category->fill($input)->save();
        return Redirect::action('CategoriesController@index');
    }

    public function destroy($id){
        $category = Categories::findOrFail($id);
        $category->delete();
        Flash::success('Kategorija sėkmingai pašalinta!');
        return Redirect::action('CategoriesController@index');
    }
}
