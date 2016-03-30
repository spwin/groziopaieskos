<?php

use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('junctions')->delete();
        DB::table('cities')->delete();
        DB::table('regions')->delete();

        $regions = [
            'vilnius' => 'Vilnius',
            'kaunas' => 'Kaunas',
            'siauliai' => 'Šiauliai',
            'klaipeda' => 'Klaipėda',
            'panevezys' => 'Panevežys',
            'utena' => 'Utena',
            'alytus' => 'Alytus',
            'telsiai' => 'Telšiai',
            'marijampole' => 'Marijampolė',
            'taurage' => 'Tauragė',
        ];

        foreach($regions as $slug => $name) {
            DB::table('regions')->insert([
                'slug' => $slug,
                'name' => $name
            ]);
        }
    }
}
