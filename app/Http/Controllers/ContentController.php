<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class ContentController extends Controller
{
    public function index(){
        $content = Content::all();
        return view('content.index')->with([
            'contents' => $content
        ]);
    }

    public function create(){
        return view('content.create');
    }

    public function store(Request $request){
        $input = $request->all();
        $content = new Content();
        $content->fill($input);
        $content->save();
        Flash::success('Naujas turinio irasas sekmingai pridetas');
        return Redirect::action('ContentController@index');
    }

    public function edit($id){
        $content = Content::findOrFail($id);
        return view('content.edit')->with([
            'content' => $content
        ]);
    }

    public function update($id, Request $request){
        $input = $request->all();
        $content = Content::findOrFail($id);
        $content->fill($input);
        $content->save();
        Flash::success('Irasau sekmingai issaugotas');
        return Redirect::action('ContentController@index');
    }

    public function destroy($id){
        $content = Content::findOrFail($id);
        $content->delete();
        Flash::error('Irasas sekmingai pasalintas');
        return Redirect::action('ContentController@index');
    }
}
