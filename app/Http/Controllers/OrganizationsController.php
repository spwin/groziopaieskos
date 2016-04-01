<?php

namespace App\Http\Controllers;

use App\Days;
use App\OpeningTimes;
use App\Organization;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class OrganizationsController extends Controller
{
    private $title = 'Visi įrašas';

    public function index(){
        $organizations = Organization::with(['getCategory', 'getOrganizationData'])->get();
        return view('organizations.index')->with([
            'organizations' => $organizations,
            'title' => $this->title
        ]);
    }

    public function approve($id, $approve){
        DB::table('organizations')->where(['id' => $id])->update([
            'approved' => $approve
        ]);

        if($approve == 1)
            Flash::success('Įrašas sėkmingai patvirtintas');
        else
            Flash::error('Įrašo tapo nepatvirtintas');
        return Redirect::back();
    }

}
