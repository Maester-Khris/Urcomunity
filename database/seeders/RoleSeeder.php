<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Date;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // pensez a transformé le seeder de role en procedure stocké 
    // qui s'execute des que la table role est céé

    public function run()
    {
        //
        DB::table('memberroles')->insert([
            [
                'fonction' => 'Délégé',
                'groupe' => 'Zone',
                'created_at' =>  date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'fonction' => 'Président',
                'groupe' => 'Bureau Exécutif',
                'created_at' =>  date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'fonction' => 'Chargé de communication',
                'groupe' => 'Bureau Exécutif',
                'created_at' =>  date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'fonction' => 'Membre',
                'groupe' => 'Bureau Exécutif',
                'created_at' =>  date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'fonction' => 'Président',
                'groupe' => 'Conseil Sage',
                'created_at' =>  date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'fonction' => 'Membre',
                'groupe' => 'Conseil Sage',
                'created_at' =>  date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ]
        ]);
    }
}
