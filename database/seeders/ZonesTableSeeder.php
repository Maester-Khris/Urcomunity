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
               'membre_id' => 1,
               'localisation' => 'Melen Carrefour',
           ],
           [
               'id' => 2,
               'membre_id' => 3,
               'localisation' => 'Melen - Miniferme',
           ],
       ]);
    }
}
