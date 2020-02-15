<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert(
            [
                [
                    'name_partner' => 'Mohamed',
                    'city_id' => 1,
                ],[
                    'name_partner' => 'Hassan',
                    'city_id' => 2,
                ],[
                    'name_partner' => 'Nada',
                    'city_id' => 3,
                ]
            ]
        );
    }
}
