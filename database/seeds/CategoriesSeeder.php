<?php

use Illuminate\Database\Seeder;

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
                'name_plural' => 'Grozio salonai',
                'name_single' => '',
                'slug' => '',
                'image' => 'pvz.: grozio-salonai.png',
                'order' => 1
            ],
            'facilities' => [
                'Kirpimas',
                'Nosies valymas'
            ]
        ];

        $categories[] = [
            'category' => [
                'name_plural' => 'Tatoo',
                'name_single' => '',
                'slug' => '',
                'image' => 'pvz.: grozio-salonai.png',
                'order' => 1
            ],
            'facilities' => [
                'Kirpimas',
                'Nosies valymas'
            ]
        ];
    }
}
