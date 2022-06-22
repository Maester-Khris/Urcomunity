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
               'partcipation_heureuse' => 0,
               'partcipation_malheureuse' => 0,
               'url_photo' => '1549823220.png',
               'registered_date' => '2022-04-10',
           ],
           [
            'id' => 2,
            'user_id' => null,
            'zone_id' => 1,
            'village_id' => 1,
            'name' => 'NJIMOGNI Mama',
            'telephone' => '+237 656911235',
            'matricule' => '21A0001kt2',
            'deleguate' => false,
            'statut' => 1,
            'numero_cni' => '1100344483',
            'partcipation_heureuse' => 6,
            'partcipation_malheureuse' => 5,
            'url_photo' => null,
            'registered_date' => '2021-04-10',
        ],
        [
            'id' => 3,
            'user_id' => null,
            'zone_id' => 1,
            'village_id' => 2,
            'name' => 'NJI NJOYA Dairou',
            'telephone' => '+237 65693456',
            'matricule' => '21A0002YDE',
            'deleguate' => false,
            'statut' => 1,
            'numero_cni' => '1100344483',
            'partcipation_heureuse' => 6,
            'partcipation_malheureuse' => 5,
            'url_photo' => null,
            'registered_date' => '2021-04-10',
        ],
        [
            'id' => 4,
            'user_id' => null,
            'zone_id' => 1,
            'village_id' => 2,
            'name' => 'NJI KAPELUOP',
            'telephone' => '+237 6569113456',
            'matricule' => '21A0003kt3',
            'deleguate' => false,
            'statut' => 1,
            'numero_cni' => '1100344483',
            'partcipation_heureuse' => 0,
            'partcipation_malheureuse' => 0,
            'url_photo' => null,
            'registered_date' => '2021-04-10',
        ],
        [
               'id' => 5,
               'user_id' => null,
               'zone_id' => 1,
               'village_id' => 3,
               'name' => 'KOUOTOU AKIM',
               'telephone' => '+237 656913456',
               'matricule' => '21A0004dla',
               'deleguate' => false,
               'statut' => 1,
               'numero_cni' => '1100344483',
               'partcipation_heureuse' => 0,
               'partcipation_malheureuse' => 0,
               'url_photo' => null,
               'registered_date' => '2021-04-10',
           ],
       ]);
    }
}
