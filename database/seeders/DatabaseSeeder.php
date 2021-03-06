<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
          $this->call(AppPermission::class);
          $this->call(ZonesTableSeeder::class);
          $this->call(MembresTableSeeder::class);
          // $this->call(Dataset1::class);
          $this->call(EvenementsTableSeeder::class);
          $this->call(RoleSeeder::class);

    }
}
