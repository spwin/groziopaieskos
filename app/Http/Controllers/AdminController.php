<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){
        $cities = Cities::all();
        return view('admin.index')->with([
            'cities' => $cities
        ]);
    }
}
