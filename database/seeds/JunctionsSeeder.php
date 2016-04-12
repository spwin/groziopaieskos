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
                'rasos' => 'Rasos'
            ],
            'kaunas-miestas' => [
                'sanciu' => 'Šančiai',
                'centro' => 'Centras',
                'aleksoto' => 'Aleksotas',
                'zaliakalnio' => 'Žaliakalnis',
                'petrasiunu' => 'Petrašiūnai',
                'dainavos' => 'Dainava',
                'vilijampoles' => 'Vilijampolė',
                'eiguliu' => 'Eiguliai',
                'silainiu' => 'Šilainiai',
                'panemunes' => 'Panemunė'
            ],
            'klaipeda-miestas' => [
                'tauralaukis' => 'Tauralaukis',
                'lypkiai' => 'Lypkiai',
                'sendvaris' => 'Sendvaris',
                'luize' => 'Luizė',
                'rumpiskes' => 'Rumpiškės',
                'labrenciskes' => 'Labrenciškės',
                'smelte' => 'Smeltė',
                'gedminai' => 'Gedminai',
                'centras' => 'Centras',
                'zarde' => 'Žardė',
                'melnrage' => 'Melnragė',
                'smiltyne' => 'Smiltynė'
            ]
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
