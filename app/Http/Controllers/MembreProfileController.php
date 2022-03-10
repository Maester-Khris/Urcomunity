<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Membre;
use App\Models\User;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MembreProfileController extends Controller
{
    //
    public function index()
    {
        $membres = Membre::all();
        return view('profiles', compact('membres'));
    }

    public function delegues()
     {
         $delegues = Membre::where('deleguate',1)->get();
         return view('delegues', compact('delegues'));
     }

    // on un cree un user avec ses info son role et sa permision
    // Note: si il a deja un role changer de role et de permission
    public function setrole(Request $request){
        $request->validate([
            'nom_membre' => 'required',
            'role_membre' => 'required'
        ]);

        $membre = Membre::where('name',$request->nom_membre)->first();
        $email = Str::limit($membre->name,7);
        $email = $email . '@gmail.com';

        $user = User::create([
            'name' => $membre->name,
            'email' => $email,
            'password' => Hash::make($membre->matricule),
        ]);

        if($request->role_membre == "Delege"){
            $perm = Permission::find(1);
            $role = Role::find(1);
            $user->givePermissionTo($perm);
            $user->assignRole($role);
            $membre->role()->save($role);
        }else{
            $perm_name = explode('_',$request->role_membre)[0];
            if( $perm_name == "B"){
                $perm = Permission::find(3);
            }else{
                $perm = Permission::find(2);
            }

            $role = Role::where("name",$request->role_membre)->first();
            $user->givePermissionTo($perm);
            $user->assignRole($role);
            $membre->role()->save($role);
        }
        
        return redirect('/site-managment');
    }

    public function create(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'telephone' => 'required',
            'deleguate' => 'required',
            'registered_date' => 'required'
        ]);
        $membre = new Membre;
        $membre->name=$request['name'];
        $membre->telephone=$request['telephone'];
        $membre->deleguate=$request['deleguate'];
        $membre->registered_date=$request['registered_date'];
        $membre->matricule='MAAERRF';
        $membre->statut=1;

       // Saving related model
        $zone = Zone::where('localisation',$request['zone'])->first();
        $zone->membres()->save($membre);


        return redirect('/site-managment');
    }
}
