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
               'name' => 'Plantini Moricho',
               'telephone' => '122222222',
               'matricule' => '22A0003YD',
               'deleguate' => true,
               'statut' => 1,
               'registered_date' => '2020-08-23',
           ],
           [
               'id' => 2,
               'user_id' => null,
               'zone_id' => 2,
               'name' => 'Juninho Franklin',
               'telephone' => '123332222',
               'matricule' => '22A0002BK',
               'deleguate' => false,
               'statut' => 1,
               'registered_date' => '2020-02-23',
           ],
           [
               'id' => 3,
               'user_id' => null,
               'zone_id' => 1,
               'name' => 'Materrazi Potier',
               'telephone' => '12233245',
               'matricule' => '22A0003GE',
               'deleguate' => false,
               'statut' => 0,
               'registered_date' => '2021-04-13',
           ],
       ]);
    }
}
