<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Cities;
use App\Days;
use App\Junctions;
use App\OpeningTimes;
use App\Organization;
use App\OrganizationData;
use App\OrganizationsFacilities;
use App\Regions;
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

    public function edit($id){
        $organization = Organization::findOrFail($id);
        $categories = Categories::lists('name_plural', 'id');
        $categories_db = Categories::with(['getFacilities', 'getFacilitiesCategories'])->get();
        $regions = Regions::lists('name', 'id');
        $cities = Cities::where(['region_id' => $organization->getCity()->first()->region_id])->lists('name', 'id');
        $junctions_db = Junctions::all();
        $junctions = [];
        foreach($junctions_db as $junction){
            $junctions[$junction->city_id][$junction->id] = $junction->name;
        }
        return view('organizations.'.($organization->type == 'imone' ? 'company' : 'person').'.edit')->with([
            'categories_db' => $categories_db,
            'organization' => $organization,
            'junctions' => $junctions,
            'categories' => $categories,
            'regions' => $regions,
            'cities' => $cities
        ]);
    }

    public function update($id, Request $request){
        $organization = Organization::findOrFail($id);
        $ot = OpeningTimes::findOrFail($organization->id);
        $input = $request->all();
        echo '<pre>';
        print_r($input);
        echo '</pre>';

        $global_data = [
            'title' => $input['title'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'email' => $input['email'],
            'place' => $input['place'],
            'approved' => 0,
            'type' => $input['type'],
            'description' => $input['description'],
            'category_id' => $input['category'],
            'city_id' => $input['city']
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = 'uploads/logos';
            $fileName = rand(11111,99999).$request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $input['image'] = $fileName;
            $global_data['logo'] = $input['image'];
        }

        $monday = Days::findOrFail($ot->getMonday()->first()->id);
        $input['week']['monday']['opened'] = (array_key_exists('opened', $input['week']['monday']) && $input['week']['monday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['monday']);
        $monday->save();

        $monday = Days::findOrFail($ot->getTuesday()->first()->id);
        $input['week']['tuesday']['opened'] = (array_key_exists('opened', $input['week']['tuesday']) && $input['week']['tuesday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['tuesday']);
        $monday->save();

        $monday = Days::findOrFail($ot->getWednesday()->first()->id);
        $input['week']['wednesday']['opened'] = (array_key_exists('opened', $input['week']['wednesday']) && $input['week']['wednesday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['wednesday']);
        $monday->save();

        $monday = Days::findOrFail($ot->getThursday()->first()->id);
        $input['week']['thursday']['opened'] = (array_key_exists('opened', $input['week']['thursday']) && $input['week']['thursday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['thursday']);
        $monday->save();

        $monday = Days::findOrFail($ot->getFriday()->first()->id);
        $input['week']['friday']['opened'] = (array_key_exists('opened', $input['week']['friday']) && $input['week']['friday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['friday']);
        $monday->save();

        $monday = Days::findOrFail($ot->getSaturday()->first()->id);
        $input['week']['saturday']['opened'] = (array_key_exists('opened', $input['week']['saturday']) && $input['week']['saturday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['saturday']);
        $monday->save();

        $monday = Days::findOrFail($ot->getSunday()->first()->id);
        $input['week']['sunday']['opened'] = (array_key_exists('opened', $input['week']['sunday']) && $input['week']['sunday']['opened'] == 'on') ? 1 : 0;
        $monday->fill($input['week']['sunday']);
        $monday->save();

        $organization_data = OrganizationData::findOrFail($organization->organization_data_id);
        if($input['type'] == 'imone') {
            $organization_data_input = [
                'imones_kodas' => $input['imones_kodas'],
                'pvm_kodas' => $input['pvm_kodas'],
                'website' => $input['website'],
                'name' => '',
                'pavarde' => '',
                'ind_veikl_nr' => ''
            ];
        } else {
            $organization_data_input = [
                'imones_kodas' => '',
                'pmv_kodas' => '',
                'website' => $input['website'],
                'name' => '',
                'pavarde' => $input['title'],
                'ind_veikl_nr' => $input['ind_veikl_nr']
            ];
        }
        $organization_data->fill($organization_data_input);
        $organization_data->save();

        if(array_key_exists('junction', $input)){
            $global_data['junction_id'] = $input['junction'];
        } else {
            $global_data['junction_id'] = null;
        }

        $organization->fill($global_data);
        $organization->save();

        DB::table('organizations_facilities')->where('organization_id', '=', $organization->id)->delete();
        if(array_key_exists('facility', $input) && array_key_exists($input['category'], $input['facility'])){
            foreach($input['facility'][$input['category']] as $facility => $status){
                if($status == 'on'){
                    $organization_facilities = new OrganizationsFacilities();
                    $organization_facilities->fill([
                        'facility_id' => $facility,
                        'organization_id' => $organization->id
                    ]);
                    $organization_facilities->save();
                }
            }
        }

        Flash::message($input['type'] == 'imone' ? 'Įmonės duomenys pakeisti' : 'Individualios veiklos duomenys pakeisti');
        return Redirect::back();

    }

    public function approve($id, Request $request){
        $input = $request->all();
        DB::table('organizations')->where(['id' => $id])->update([
            'approved' => $input['approved'],
            'place' => $input['place']
        ]);

        if($input['approved'] == 1)
            Flash::success('Įrašas sėkmingai patvirtintas');
        else
            Flash::error('Įrašo tapo nepatvirtintas');
        return Redirect::back();
    }

}
