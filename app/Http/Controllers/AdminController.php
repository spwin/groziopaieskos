<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Organization;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public $title = 'Nepatvirtinti įrašai';

    public function index(){
        $organizations = Organization::with(['getCategory', 'getOrganizationData'])->where(['approved' => 0])->get();
        return view('organizations.index')->with([
            'organizations' => $organizations,
            'title' => $this->title
        ]);
    }
}
