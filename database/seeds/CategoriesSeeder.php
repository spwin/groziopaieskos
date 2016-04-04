<?php

use Illuminate\Database\Seeder;
use App\Categories;
use App\FacilitiesCategories;
use \App\Facilities;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [];
        $categories[] = [
            'category' => [
                'name_plural' => 'Grožio salonai',
                'name_single' => 'Grožio salonas',
                'slug' => 'grozio-salonai',
                'image' => 'grozio-salonai.png',
                'order' => 1
            ],
            'facilities_categories' => [
                [
                    'name' => 'plaukai',
                    'order' => 1,
                    'image' => 'plaukai.png',
                    'facilities' => [
                        'Vyrų kirpimas',
                        'Moterų kirpimas',
                        'Plaukų dažymas',
                        'Plaukų šukavimas',
                        'Plaukų tiesinimas',
                        'Plaukų tiesinimas keratinu',
                        'Plaukų priauginimas',
                        'Šukuosenų darymas',
                        'Afrikietiškų kasyčių pynimas'
                    ]
                ],
                [
                    'name' => 'nagai',
                    'order' => 2,
                    'image' => 'nagas.png',
                    'facilities' => [
                        'Manikiūras',
                        'Pedikiūras',
                        'Gelinis nagų lakavimas',
                        'Nagų priauginimas geliu',
                        'Nagų priauginimas akrilu',
                    ]

                ],
                [
                    'name' => 'veidas',
                    'order' => 3,
                    'image' => 'profilis.png',
                    'facilities' => [
                        'Antakių korekcija',
                        'Blakstienų priauginimas',
                        'Blakstienų dažymas',
                        'Blakstienų rietimas',
                        'Makiažas',
                        'Ilgalaikis makiažas (permanentinis)',
                    ]
                ],
            ],
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'Soliariumai',
                'name_single' => 'Soliariumas',
                'slug' => 'soliariumai',
                'image' => 'soliariumai.png',
                'order' => 2
            ],
            'facilities' => [
                'Kūno masažai',
                'Veido masažai',
                'Kūno šveitimai',
                'Judėsio terapija',
                'Pirtys',
                'Baseinai',
                'Joga',
                'Treniruoklių salė'
            ]
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'Tatuiruočių salonai',
                'name_single' => 'Tatuiruočių salonas',
                'slug' => 'tatuiruociu-salonai',
                'image' => 'tattoo.png',
                'order' => 3
            ],
            'facilities' => [
                'Tatuiruočių darymas',
                'Auskarų verimas',
                'Tatuiruočių šalinimas',
                'Eskizų piešimas'
            ]
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'SPA centrai',
                'name_single' => 'SPA centras',
                'slug' => 'spa-centrai',
                'image' => 'spa.png',
                'order' => 4
            ],
            'facilities' => [
                'Kūno masažai',
                'Veido masažai',
                'Kūno šveitimai',
                'Judėsio terapija',
                'Pirtys',
                'Baseinai',
                'Joga',
                'Treniruoklių salė'
            ]
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'Kosmetologijos kabinetai',
                'name_single' => 'Kosmetologijos kabinetas',
                'slug' => 'kosmetologijos-kabinetai',
                'image' => 'kosmetologija.png',
                'order' => 5
            ],
            'facilities' => [
                'Veido valymas',
                'Spuogų gydymas',
                'Procedūros odai',
                'Veido kaukės',
                'Nugaros valymas',
                'Depiliacija vašku',
                'Mezoterapija',
                'Ilgalaikis makiažas'
            ]
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'Odontologijos kabinetai',
                'name_single' => 'Odontologijos kabinetas',
                'slug' => 'odontologijos-kabinetai',
                'image' => 'dantis.png',
                'order' => 6
            ],
            'facilities' => [
                'Burnos Higiena',
                'Dantų gydymas',
                'Dantų protezai',
                'Dantų balinimas',
                'Dantų implantai'
            ]
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'Sporto klubai',
                'name_single' => 'Sporto klubas',
                'slug' => 'sporto-klubai',
                'image' => 'sporto-klubai.png',
                'order' => 7
            ],
            'facilities' => [
                'Treniruoklių sale',
                'Aerobika',
                'Joga',
                'Asmeninės treniruotės',
                'Pirtis',
                'Sauna',
                'Baseinas'
            ]
        ];

        foreach($categories as $category){
            $new_cat = new Categories();
            $new_cat->fill($category['category']);
            $new_cat->save();
            if(array_key_exists('facilities_categories', $category)){
                foreach($category['facilities_categories'] as $fc){
                    $facility_category = new FacilitiesCategories();
                    $facility_category->fill([
                        'name' => $fc['name'],
                        'order' => $fc['order'],
                        'image' => $fc['image'],
                        'category_id' => $new_cat->id
                    ]);
                    $facility_category->save();
                    foreach($fc['facilities'] as $facility){
                        $new_facility = new Facilities();
                        $new_facility->fill([
                            'name' => $facility,
                            'category_id' => $new_cat->id,
                            'facility_category_id' => $facility_category->id
                        ]);
                        $new_facility->save();
                    }
                }
            } else {
                foreach ($category['facilities'] as $facility) {
                    $new_facility = new Facilities();
                    $new_facility->fill([
                        'name' => $facility,
                        'category_id' => $new_cat->id
                    ]);
                    $new_facility->save();
                }
            }
        }
    }
}
