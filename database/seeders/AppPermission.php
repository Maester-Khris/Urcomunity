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

        $role0 = Role::create(['name' => 'Administrator']);
        $role1 = Role::create(['name' => 'Delege']);
        $role2 = Role::create(['name' => 'B_President']);
        $role3 = Role::create(['name' => 'B_Secretairegenerale']);
        $role4 = Role::create(['name' => 'B_Chargecommunication']);
        $role5 = Role::create(['name' => 'B_Commissairecompte']);
        $role6 = Role::create(['name' => 'C_President']);
        $role7 = Role::create(['name' => 'C_PresidentHonneur']);
        $role8 = Role::create(['name' => 'C_Conseiller']);

        // assign role and permission 'super'
        $user = User::create([
            'name' => 'Fire Admin',
            'email' => 'fire_admin@gmail.com',
            'url_photo' => '1549823220.png',
            'password' => Hash::make('22A0000YD'),
        ]);
        $user->givePermissionTo($permission3);
        $user->assignRole($role0);
    }
}
