<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('zones')->insert([
           [
               'id' => 1,
               'localisation' => 'Yaoundé',
               'identifiant' => 'YDE',
           ]
       ]);

       DB::table('villages')->insert([
        [
            'id' => 1,
            'nom' => 'Kouti',
        ],
        [
            'id' => 2,
            'nom' => 'Njiyit',
        ],
        [
            'id' => 3,
            'nom' => 'Kouchankap',
        ]
    ]);
    }
}
