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
                'vilnius-miestas' => 'Vilnius',
                'vilniaus-raj' => 'Vilniaus raj.',
                'svencioniu-raj' => 'Švenčionių raj.',
                'ukmerges-raj' => 'Ukmergės raj.',
                'sirvintu-raj' => 'Širvintų raj.',
                'elektrenu-sav' => 'Elektrėnų sav.',
                'traku-raj' => 'Trakų raj.',
                'salcininku-raj' => 'Šalčininkų raj.'
            ],
            'kaunas' => [
                'kaunas-miestas' => 'Kaunas',
                'kauno-raj' => 'Kauno raj.',
                'raseiniu-raj' => 'Raseinių raj.',
                'kedainiu-raj' => 'Kėdainių raj.',
                'jonavos-raj' => 'Jonavos raj.',
                'kaisiadoriu-raj' => 'Kaišiadorių raj.',
                'prienu-raj' => 'Prienų raj.',
                'birstono-sav' => 'Birštono sav.'
            ],
            'siauliai' => [
                'siauliai-miestas' => 'Šiauliai',
                'siauliu-raj' => 'Šiaulių raj.',
                'akmenes-raj' => 'Akmenės raj.',
                'joniskio-raj' => 'Joniškio raj.',
                'pakruojo-raj' => 'Pakruojo raj.',
                'radviliskio-raj' => 'Radviliškio raj.',
                'kelmes-raj' => 'Kelmės raj.'
            ],
            'klaipeda' => [
                'klaipeda-miestas' => 'Klaipėda',
                'klaipedos-raj' => 'Klaipėdos raj.',
                'kretingos-raj' => 'Kretingos raj.',
                'palangos-sav' => 'Palangos raj.',
                'skuodo-raj' => 'Skuodo raj.',
                'neringos-sav' => 'Neringos sav.',
                'silutes-raj' => 'Šilutės raj.'
            ],
            'panevezys' => [
                'panevezys-miestas' => 'Panevėžys',
                'panevezio-raj' => 'Panevėžio raj.',
                'pasvalio-raj' => 'Pasvalio raj.',
                'birzu-raj' => 'Biržų raj.',
                'kupiskio-raj' => 'Kupiškio raj.',
                'rokiskio-raj' => 'Rokiškio raj.'
            ],
            'utena' => [
                'utenos-raj' => 'Utenos raj.',
                'anyksciu-raj' => 'Anykščių raj.',
                'moletu-raj' => 'Molėtų raj.',
                'zarasu-raj' => 'Zarasų raj.',
                'ignalinos-raj' => 'Ignalinos raj.'
            ],
            'alytus' => [
                'alytus-miestas' => 'Alytus',
                'alytaus-raj' => 'Alytaus raj.',
                'lazdiju-raj' => 'Lazdijų raj.',
                'druskininku-sav' => 'Druskininkų sav.',
                'varenos-raj' => 'Varėnos raj.'
            ],
            'telsiai' => [
                'mazeikiu-raj' => 'Mažeikių raj.',
                'telsiu-raj' => 'Telšių raj.',
                'plunges-raj' => 'Plungės raj.',
                'rietavo-raj' => 'Rietavo raj.'
            ],
            'marijampole' => [
                'marijampoles-sav' => 'Marijampolės sav.',
                'kalvarijos-sav' => 'Kalvarijos sav.',
                'vilkaviskio-raj' => 'Vilkaviškio raj.',
                'kazlu-rudos-sav' => 'Kazlų Rūdos sav.',
                'sakiu-raj' => 'Šakių raj.'
            ],
            'taurage' => [
                'taurages-raj' => 'Tauragės raj.',
                'silales-raj' => 'Šilalės raj.',
                'jurbarko-raj' => 'Jurbarko raj.',
                'pagegiu-sav' => 'Pagėgių sav.'
            ],
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
