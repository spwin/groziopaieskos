<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'gp_admin',
            'email' => 'spwinwk@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
