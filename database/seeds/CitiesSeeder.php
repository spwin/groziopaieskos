<?php

use App\Regions;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        $regions = [
            'vilnius' => [
                'vilnius' => 'Vilnius',
                'nemencine' => 'Nemenčinė'
            ],
            'kaunas' => [],
            'siauliai' => [],
            'klaipeda' => [],
            'panevezys' => [],
            'utena' => [],
            'alytus' => [],
            'telsiai' => [],
            'marijampole' => [],
            'taurage' => [],
        ];

        foreach($regions as $slug => $cities) {
            $region = Regions::where(['slug' => $slug])->first();
            foreach($cities as $city_slug => $city){
                DB::table('cities')->insert([
                    'slug' => $city_slug,
                    'name' => $city,
                    'region_id' => $region->id
                ]);
            }
        }
    }
}
