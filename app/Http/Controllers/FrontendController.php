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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laracasts\Flash\Flash;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.main.index');
    }

    public function search(){
        $input = Input::all();
        $type = 'search';
        $query = array_key_exists('query', $input) ? $input['query'] : '';
        $city_db = Cities::with('getRegion')->where(['slug' => 'vilnius'])->first();
        $organizations = Organization::with(['getCategory', 'getFacilities', 'getOpeningTimes', 'getOrganizationData'])
            ->join('cities', 'organizations.city_id', '=', 'cities.id')
            ->join('organization_data', 'organizations.organization_data_id', '=', 'organization_data.id')
            ->join('junctions', 'cities.id', '=', 'junctions.city_id')
            ->join('regions', 'cities.region_id', '=', 'regions.id')
            ->join('categories', 'organizations.category_id', '=', 'categories.id')
            ->where(function ($organizations) {
                $query = Input::has('query') ? Input::get('query') : '';
                $words = explode(' ', $query);
                foreach($words as $word){
                    $organizations->where( function ($organizations) use ($word){
                        $organizations
                            ->orwhere('organizations.title', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('categories.name_plural', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('cities.name', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('junctions.name', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('regions.name', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('organizations.place', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('organization_data.name', 'LIKE', '%'.($word ? $word : 'unknown').'%')
                            ->orWhere('organization_data.pavarde', 'LIKE', '%'.($word ? $word : 'unknown').'%');
                        });
                }
            })
            ->groupBy('organizations.id')->get();
        return view('frontend.results')->with([
            'organizations' => $organizations,
            'city_db' => $city_db,
            'type' => $type,
            'query' => $query
        ]);
    }

    public function company(){
        $categories = Categories::with(['getFacilities', 'getFacilitiesCategories'])->get();
        $junctions_db = Junctions::all();
        $junctions = [];
        foreach($junctions_db as $junction){
            $junctions[$junction->city_id][$junction->id] = $junction->name;
        }
        $regions = Regions::lists('name', 'id');
        $cities = Cities::lists('name', 'id');
        return view('frontend.registration.company')->with([
            'categories' => $categories,
            'regions' => $regions,
            'cities' => $cities,
            'junctions' => $junctions
        ]);
    }

    public function person(){
        $categories = Categories::with('getFacilities')->get();
        $junctions_db = Junctions::all();
        $junctions = [];
        foreach($junctions_db as $junction){
            $junctions[$junction->city_id][$junction->slug] = $junction->name;
        }
        $regions = Regions::lists('name', 'id');
        $cities = Cities::lists('name', 'id');
        return view('frontend.registration.person')->with([
            'categories' => $categories,
            'regions' => $regions,
            'cities' => $cities,
            'junctions' => $junctions
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

    public function region($region){
        $region_db = Regions::where(['slug' => $region])->with('getCities')->first();
        $categories = Categories::with('getFacilities')->get();
        return view('frontend.map.regions')->with([
            'region' => $region,
            'region_db' => $region_db,
            'categories' => $categories
        ]);
    }

    public function city($region, $city){
        $city_db = Cities::with('getJunctions')->where(['slug' => $city])->first();
        $categories = Categories::all();
        if($city_db->getJunctions()->count() > 0){
            return view('frontend.map.cities')->with([
                'city_db' => $city_db,
                'city' => $city,
                'region' => $region,
                'categories' => $categories,
                'type' => 'categories',
                'filter' => 'filter_junction'
            ]);
        } else {
            return view('frontend.filter')->with([
                'city_db' => $city_db,
                'city' => $city,
                'categories' => $categories,
                'region' => $region,
                'type' => 'categories',
                'filter' => 'filter_city'
            ]);
        }
    }

    public function results($region, $city, Request $request){
        $input = $request->all();
        $type = array_key_exists('type', $input) ? $input['type'] : 'unknown';
        $city_db = Cities::with('getRegion')->where(['slug' => $city])->first();
        $organizations = Organization::with(['getCategory', 'getFacilities', 'getOpeningTimes', 'getOrganizationData'])->get();
        return view('frontend.results')->with([
            'organizations' => $organizations,
            'city_db' => $city_db,
            'type' => $type
        ]);
    }

    public function about($id, $slug){
        $organization = Organization::with(['getCategory', 'getFacilities', 'getOpeningTimes', 'getOrganizationData'])->where(['id' => $id])->first();
        return view('frontend.about')->with([
            'organization' => $organization
        ]);
    }

    public function formTest(Request $request){
        $input = $request->all();
        echo '<pre>';
        print_r($input);
        echo '</pre>';
    }

    public function tooltip($city){
        $city_db = Cities::where(['slug' => $city])->with('getJunctions')->first();
        if(count($city_db) > 0) {
            $city_rez = $city_db->name;
        } else {
            $city_rez = 'Unknown';
        }
        $output = '<div class="toolTipClass"><h3>' . $city_rez . '</h3><ul></div>';
        return $output;
    }

    public function tooltipJunction($city){
        $city_db = Junctions::where(['slug' => $city])->first();
        if(count($city_db) > 0) {
            $city_rez = $city_db->name;
        } else {
            $city_rez = 'Unknown';
        }
        $output = '<div class="toolTipClass"><h3>' . $city_rez . '</h3><ul></div>';
        return $output;
    }

    public function service($region, $city, $category_slug){
        $city_db = Cities::with('getJunctions')->where(['slug' => $city])->first();
        $category = Categories::with('getFacilities')->where(['slug' => $category_slug])->first();
        $categories = Categories::all();
        if($city_db->getJunctions()->count() > 0){
            return view('frontend.map.cities')->with([
                'city_db' => $city_db,
                'city' => $city,
                'region' => $region,
                'category' => $category,
                'type' => 'single',
                'filter' => 'filter_junctions',
                'categories' => $categories
            ]);
        } else {
            return view('frontend.filter')->with([
                'city_db' => $city_db,
                'city' => $city,
                'category' => $category,
                'region' => $region,
                'type' => 'single',
                'filter' => 'filter_city'
            ]);
        }
    }

    public function store($type, Request $request){
        $input = $request->all();

        $global_data = [
            'title' => $input['title'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'email' => $input['email'],
            'place' => $input['place'],
            'approved' => 0,
            'type' => $type == 'company' ? 'imone' : 'asmuo',
            'description' => $input['description'],
            'category_id' => $input['category'],
            'city_id' => $input['city']
        ];

        // SAVE FILE
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $destinationPath = 'uploads/logos';
            $fileName = rand(11111,99999).$request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = 'no_image.png';
        }
        $global_data['logo'] = $input['image'];

        // SAVE OPENING TIME
        $week = [];
        foreach($input['open_time']as $dayName => $_ot){
            $times = explode(' - ', (string) $_ot['time']);
            $data = [
                'opened' => array_key_exists('open', $_ot) && $_ot['open'] == 'on' ? 1 : 0,
                'from' => $times[0],
                'to' => $times[1]
            ];
            $day = new Days();
            $day->fill($data);
            $day->save();
            $week[$dayName] = $day->id;
        }
        $opening_times = new OpeningTimes();
        $opening_times->fill($week);
        $opening_times->save();
        $global_data['opening_time_id'] = $opening_times->id;

        // SAVE ORGANIZATION DATA
        $organization_data = new OrganizationData();
        if($type == 'company') {
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
        $global_data['organization_data_id'] = $organization_data->id;

        // JUNCTION

        if(array_key_exists('junction', $input)){
            $global_data['junction_id'] = $input['junction'];
        } else {
            $global_data['junction_id'] = null;
        }

        // SAVE ORGANIZATION
        $organization = new Organization();
        $organization->fill($global_data);
        $organization->save();

        if(array_key_exists('facilities', $input) && array_key_exists($input['category'], $input['facilities'])){
            foreach($input['facilities'][$input['category']] as $facility => $status){
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

        Flash::message($type == 'company' ? 'Registracijos užklausa išsiųsta. Laukite patvirtinimo.' : 'Registracijos užklausa išsiųsta. Laukite patvirtinimo.');
        return Redirect::back();
    }
}
