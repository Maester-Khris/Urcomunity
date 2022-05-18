<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('membres')->insert([
           [
               'id' => 1,
               'user_id' => 1,
               'zone_id' => 1,
               'village_id' => 1,
               'name' => 'Fire Admin ',
               'telephone' => '+237 656911024',
               'matricule' => '22A0000YD',
               'deleguate' => false,
               'statut' => 1,
               'numero_cni' => '1100344483',
               'url_photo' => '1549823220.png',
               'registered_date' => '2022-04-10',
           ]
       ]);
    }
}
