<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Cities;
use App\Days;
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

    public function company(){
        $categories = Categories::with('getFacilities')->get();
        $regions = Regions::lists('name', 'id');
        $cities = Cities::lists('name', 'id');
        return view('frontend.registration.company')->with([
            'categories' => $categories,
            'regions' => $regions,
            'cities' => $cities
        ]);
    }

    public function person(){
        $categories = Categories::with('getFacilities')->get();
        $regions = Regions::lists('name', 'id');
        $cities = Cities::lists('name', 'id');
        return view('frontend.registration.person')->with([
            'categories' => $categories,
            'regions' => $regions,
            'cities' => $cities
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

    public function formTest(Request $request){
        $input = $request->all();
        echo '<pre>';
        print_r($input);
        echo '</pre>';
    }
    /*public function tooltip($region){
        $region_db = Regions::where(['slug' => $region])->with('getCities')->first();
        $organizations_count = $region_db->getCities()->join('organizations', 'cities.id', '=', 'organizations.city_id')->where(['organizations.approved' => 1])->count();
        $output = '<div class="toolTipClass"><h3>'.strtoupper($region_db->name).' ('.$organizations_count.')</h3><ul>';

        $output .= '
                        <li><img src="img/header-icons/grozio-salonai.png">Grožio salonai (101)</li>
                        <li><img src="img/header-icons/soliariumai.png">Soliariumai (33)</li>
                        <li><img class="dantis" src="img/header-icons/dantis.png">Odontologijos kabinetai (8)</li>
                        ';
        $output .= '</ul><p>Žiūrėti viską</p></div>';
        return $output;
    }*/

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
