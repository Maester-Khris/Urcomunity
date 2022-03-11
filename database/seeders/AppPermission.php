<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AppPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permission1 = Permission::create(['name' => 'publish event']);
        $permission2 = Permission::create(['name' => 'validate event']);
        $permission3 = Permission::create(['name' => 'manage user']);

        $role1 = Role::create(['name' => 'Delege']);
        $role2 = Role::create(['name' => 'B_President']);
        $role3 = Role::create(['name' => 'C_President']);
        $role2 = Role::create(['name' => 'B_Chargecommunication']);
        $role2 = Role::create(['name' => 'B_Membre']);
        $role3 = Role::create(['name' => 'C_Membre']);

        // assign role and permission 'super'
        $user = User::create([
            'name' => 'Plantini Moricho',
            'email' => 'Plantini@gmail.com',
            'password' => Hash::make('MAEMMRAM'),
        ]);
    }
}
