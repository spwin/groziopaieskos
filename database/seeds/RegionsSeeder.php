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
            'vilnius' => 'Vilniaus',
            'kaunas' => 'Kauno',
            'siauliai' => 'Šiaulių',
            'klaipeda' => 'Klaipėdos',
            'panevezys' => 'Panevėžio',
            'utena' => 'Utenos',
            'alytus' => 'Alytaus',
            'telsiai' => 'Telšių',
            'marijampole' => 'Marijampolės',
            'taurage' => 'Tauragės',
        ];

        foreach($regions as $slug => $name) {
            DB::table('regions')->insert([
                'slug' => $slug,
                'name' => $name
            ]);
        }
    }
}
