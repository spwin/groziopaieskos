<?php

use App\Cities;
use Illuminate\Database\Seeder;

class JunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('junctions')->delete();

        $cities = [
            'alytus-miestas' => [
                'alytus-verkiai' => 'Verkiai',
                'alytus-antakalnis' => 'Antakalnis',
                'alytus-pasilaiciai' => 'Pašilaičiai',
                'alytus-fabijoniskes' => 'Fabijoniškės'
            ],
            'vilnius-miestas' => [
                'verkiai' => 'Verkiai',
                'antakalnis' => 'Antakalnis',
                'pasilaiciai' => 'Pašilaičiai',
                'fabijoniskes' => 'Fabijoniškės',
                'pilaite' => 'Pilaitė',
                'justiniskes' => 'Justiniškės',
                'virsuliskes' => 'Viršuliškės',
                'seskine' => 'Šeškinė',
                'snipiskes' => 'Šnipiškės',
                'zirmunai' => 'Žirmūnai',
                'karoliniskes' => 'Karoliniškės',
                'zverynas' => 'Žvėrynas',
                'grigiskes' => 'Grigiškės',
                'lazdynai' => 'Lazdynai',
                'vilkpede' => 'Vilkpėdė',
                'naujamiestis' => 'Naujamiestis',
                'senamiestis' => 'Senamiestis',
                'naujoji_vilnia' => 'Naujoji Vilnia',
                'paneriai' => 'Paneriai',
                'naujininkai' => 'Naujininkai',
                'rasai' => 'Rasai'
            ],
            'kaunas-miestas' => [],
            'klaipeda-miestas' => [],
            'siauliai-miestas' => []
        ];

        foreach($cities as $slug => $junctions) {
            $city = Cities::where(['slug' => $slug])->first();
            foreach($junctions as $junction_slug => $junction){
                DB::table('junctions')->insert([
                    'slug' => $junction_slug,
                    'name' => $junction,
                    'city_id' => $city->id
                ]);
            }
        }
    }
}
