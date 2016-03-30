<?php

namespace App\Http\Controllers;

use App\Days;
use App\OpeningTimes;
use App\Organization;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrganizationsController extends Controller
{
    public function index(){
        $organizations = Organization::all();
        return view('organizations.index')->with([
            'organizations' => $organizations
        ]);

    }

}
