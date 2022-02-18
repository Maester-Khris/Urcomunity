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
               'name' => 'Plantini Moricho',
               'deleguate' => true,
               'registerd_date' => '2020-08-23',
           ],
           [
             'id' => 2,
               'name' => 'Juninho Franklin',
               'deleguate' => false,
               'registerd_date' => '2020-02-23',
           ],
           [
             'id' => 3,
               'name' => 'Materrazi Potier',
               'deleguate' => false,
               'registerd_date' => '2021-04-13',
           ],
       ]);
    }
}
