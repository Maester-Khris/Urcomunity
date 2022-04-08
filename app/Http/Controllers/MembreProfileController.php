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
use Date;

class MembreProfileController extends Controller
{
    //
    public function index(){
        $membres = Membre::all();
        return view('profiles', compact('membres'));
    }


    public function delegues(){
         $delegues = Membre::where('deleguate',1)->get();
         return view('delegues', compact('delegues'));
     }

     public function resetaccount(Request $request){
      $request->validate([
          'matricule' => 'required',
          'nouveau_nom' => 'required',
          'nouveau_zone' => 'required',
          'nouveau_telephone' => 'required',
          'nouveau_cni' => 'required',
          'nouveau_registered_date' => 'required',
          'nouveau_deleguate' => 'required',
      ]);

      // on retire le membre ed l'ancienne zone et supprime l'user y associé au cas echeant
      $old_membre = Membre::where('matricule',$request->matricule)->first();
      $user_exist = User::where('name',$old_membre->name)->first();
      if($user_exist != null ){
        $user_exist->removeRole($user_exist->roles->first());
        $user_exist->delete();
      }

      $membre = new Membre;
      $membre->name = $request['nouveau_nom'];
      $membre->matricule = $old_membre->matricule;
      $membre->telephone = $request['nouveau_telephone'];
      $membre->deleguate = $request['nouveau_deleguate'];
      $membre->statut = 1;
      $membre->numero_cni = $request['nouveau_cni'];
      $membre->registered_date = $request['nouveau_registered_date'];
      $zone2 = Zone::where('localisation',$request['nouveau_zone'])->first();
      $zone2->membres()->save($membre);

      $old_membre->statut = 0;
      $old_membre->zone()->dissociate();
      $old_membre->save();
      return redirect('/site-managment');
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

        $user_exist = User::where('name',$request->nom_membre)->first();
        if($user_exist != null ){
          $user = User::where('name',$request->nom_membre)->first();
          if($user->getRoleNames()->count() >= 1 && $user->getDirectPermissions()->count() >= 1){
            $role = Role::where('name',$user->getRoleNames())->first();
            $user->removeRole($role);
            $user->revokePermissionTo($user->getDirectPermissions());
          }
        }else{
          $user = User::create([
            'name' => $membre->name,
            'email' => $email,
            'password' => Hash::make($membre->matricule),
          ]);
        }

        if($request->role_membre == "Delege"){
            $perm = Permission::find(1);
            $role = Role::find(1);
            $user->givePermissionTo($perm);
            $user->assignRole($role);
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
        }
        $membre->user_id = $user->id;
        $membre->save();
        return redirect('/site-managment');
    }


    public function create(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'telephone' => 'required',
            'deleguate' => 'required',
            'cni' => 'required',
            'registered_date' => 'required'
        ]);
        $zone = Zone::where('localisation',$request['zone'])->first();
        $nb = Membre::all()->count();

        $membre = new Membre;
        $membre->name=$request['name'];
        $membre->telephone=$request['telephone'];
        $membre->deleguate=$request['deleguate'];
        $membre->registered_date=$request['registered_date'];
        $membre->statut=1;
        $membre->numero_cni=$request['cni'];
        $membre->matricule= $this->newMatricule($nb, $zone->identifiant, $request['registered_date']);

        // Saving related model
        $zone->membres()->save($membre);
        return redirect('/site-managment');
    }


    public function newMatricule($nbr_mem, $iden, $date){
        // 'y' two digit year vs 'Y' 04 digit year
        $year = date_format(date_create($date),"y");

        $indice_memb = '';
        if($nbr_mem < 10){
           $indice_memb = '000';
        }else if($nbr_mem < 100){
           $indice_memb = '00';
        }
        else if($nbr_mem < 1000){
           $indice_memb = '0';
        }else{
           $indice_memb = '';
        }

        $lettre='';
        switch ($nbr_mem) {
            case $nbr_mem <= 100:
              $lettre = 'A';
              break;
            case $nbr_mem > 100 && $nbr_mem <= 200:
              $lettre = 'B';
              break;
            case $nbr_mem > 200 && $nbr_mem <= 300:
              $lettre = 'C';
              break;
            case $nbr_mem > 300 && $nbr_mem <= 400:
              $lettre = 'D';
              break;
            case $nbr_mem > 400 && $nbr_mem <= 500:
              $lettre = 'E';
              break;
            case $nbr_mem > 500 && $nbr_mem <= 600:
              $lettre = 'F';
              break;
            case $nbr_mem > 600 && $nbr_mem <= 700:
              $lettre = 'G';
              break;
            case $nbr_mem > 700 && $nbr_mem <= 800:
              $lettre = 'H';
              break;
            case $nbr_mem > 800 && $nbr_mem <= 900:
              $lettre = 'I';
              break;
            case $nbr_mem > 900 && $nbr_mem < 1000:
              $lettre = 'J';
              break;

            default:
               $lettre = 'X' . $nbr_mem;
          }

        return  $year . $lettre . $indice_memb . $iden ;
    }


}
