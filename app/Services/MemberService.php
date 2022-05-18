<?php
namespace App\Services;

use Date;
use DateTime;
use App\Models\Zone;
use App\Models\User;
use App\Models\Membre;
use App\Models\Village;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class MemberService{

  public function checkMemberExist($nom){
    $mem = Membre::where('name',$nom)->first();
    if($mem == null){
      return false;
    }else{
      return true;
    }
  }
  public function checkMemberExistByMatricule($mat){
    $mem = Membre::where('matricule',$mat)->first();
    if($mem == null){
      return false;
    }else{
      return true;
    }
  }


/**
 * =======================================================
 * MEMBER FUNCTIONS: Register and activate
 * =============================================================
*/

  /**
   * get form input
   * create member object and set values
   * if deleguate true, grant deleguate role
  */
  public function registerMemb($input, $file, $matricule){
    $zone = Zone::where('localisation',$input['zone'])->first();
    $village = Village::where('nom',$input['village'])->first();
  
    $membre = new Membre;
    $membre->name=$input['name'];
    $membre->village_id=$village->id;
    $membre->telephone=$input['telephone'];
    $membre->deleguate=$input['deleguate'];
    $membre->registered_date=$input['registered_date'];
    $membre->statut=1;
    $membre->numero_cni=$input['cni'];

    if($matricule == false){
      $membre->matricule= $this->newMatricule($zone->identifiant, $input['registered_date']);
    }else{
      $membre->matricule= $matricule;
    }
   
    if($file != null){
      $extension = $file['filename']->getClientOriginalExtension();
      $filename = time() . '.' .$extension;
      $file['filename']->move('uploads/profils/', $filename);
      $membre->url_photo= $filename;
    }
    $zone->membres()->save($membre);

    if($membre->deleguate == true){
      $email = Str::limit($membre->name,7);
      $email = $email . '@gmail.com';
      $user = User::create([
        'name' => $membre->name,
        'email' => $email,
        'url_photo' => $membre->url_photo,
        'password' => Hash::make($membre->matricule),
      ]);
      $this->grantRoleToexistinguser($user, "Delege");
      $membre->user_id = $user->id;
      $membre->save();
    }
  }

  /**
   * Switch between member status activation
  */
  public function toggleActivation($matricule){
    $membre = Membre::where('matricule',$matricule)->first();
    if($membre != null){
      if($membre->statut == 1){
        $membre->statut = 0;
        $membre->save();
        return 1; 
      }
      if($membre->statut == 0){
        $membre->statut = 1;
        $membre->save();
        return 1; 
      }
    }else{
      return 0; 
    }
  }

/**
 * =======================================================
 * MEMBER ROLES FUNCTIONS
 * =============================================================
*/

  /***
   * get user with this member name
   * if user exist check if user has role, if has role remove role and revoke permission
   * if user exist and has no role grant role
   * if user doesnt exist create and grant role
  */
  public function newRole($input){
    $membre = Membre::where('name',$input['nom_membre'])->first();
    $email = Str::limit($membre->name,7);
    $email = $email . '@gmail.com';

    $user_exist = User::where('name',$input['nom_membre'])->first();
    if($user_exist != null ){
      $user = User::where('name',$input['nom_membre'])->first();
      if($user->getRoleNames()->count() >= 1 && $user->getDirectPermissions()->count() >= 1){
        $role = Role::where('name',$user->getRoleNames())->first();
        $user->removeRole($role);
        $user->revokePermissionTo($user->getDirectPermissions());
      }else{
        $this->grantRoleToexistinguser($user, $input['role_membre']);
        if($input['role_membre'] == "Delege"){
          $membre->deleguate = 1;
          $membre->save();
        }
      }

    }else{
      $user = User::create([
        'name' => $membre->name,
        'email' => $email,
        'url_photo' => $membre->url_photo,
        'password' => Hash::make($membre->matricule),
      ]);
    }

    $this->grantRoleToexistinguser($user, $input['role_membre']);

    if($input['role_membre'] == "Delege"){
      $membre->deleguate = 1;
    }
    $membre->user_id = $user->id;
    $membre->save();
  }

  /***
   * get user and role
   * grant role and permission according to rolename
   * 
  */
  public function grantRoleToexistinguser($user, $input_role){
    if($input_role == "Delege"){
      $perm = Permission::find(1);
      $role = Role::find(2);
      $user->givePermissionTo($perm);
      $user->assignRole($role);

    }else{
      $perm_name = explode('_',$input_role)[0];
      if($perm_name == "B"){
        $perm = Permission::find(3);
      }
      if($perm_name == "C"){
        $perm = Permission::find(2);
      }
      $role = Role::where("name",$input_role)->first();
      $user->givePermissionTo($perm);
      $user->assignRole($role);
    }
  }

  /***
   * 0: member/user(with role like this) not found
   * 00: utilsateur not found
   * 1: member and user fetched correctly and role removed
  */
  public function DropRole($matricule, $input_role){
    $membre = Membre::where('matricule',$matricule)->first();
    if($membre != null){
      if($input_role == "Delegué"){
        $user =  User::whereHas('roles', function($query) {
          $query->where('name','Delege');
        })
        ->where("name",$membre->name)
        ->first();
      }else{
        $user = User::whereHas('roles', function($query) use ($input_role) {
          $query->where('name','LIKE', '%'.$input_role.'%');
        })
        ->where("name",$membre->name)
        ->first();
      }
     
      if($user != null){
        $role = Role::where('name',$user->getRoleNames())->first();
        $user->removeRole($role);
        $user->revokePermissionTo($user->getDirectPermissions());
        if($membre->deleguate = 1){
          $membre->deleguate = 0;
          $membre->save();
        }
        return 1;
      }else{
        return 0;
      }
    }else{
      return 00;
    }
  }

/**
 * =======================================================
 * UTILITY FUNCTIONS
 * =============================================================
*/

  public function newMatricule($iden, $date){
    $nbr_mem = Membre::all()->count();
    $nbr_mem;
    
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
        $lettre = 'X' ;
    }

    if($lettre != "X"){
      return  $year . $lettre . $indice_memb . $nbr_mem . $iden ;
    }else{
      return  $year . $lettre . $nbr_mem . $iden ;
    }
  }
  
}
