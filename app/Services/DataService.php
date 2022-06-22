<?php
namespace App\Services;

use App\Models\Zone;
use App\Models\Membre;
use App\Models\Village;
use App\Models\Participantcollecte;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class DataService
{
      public function checkRoleExist($role_name){
            $role = Role::where("name",$role_name)->first();
            if($role == null){
                  return false;
            }else{
                  return true;
            }
      }

      public function checkVillageExist($village_name){
            $village = Village::where("nom",$village_name)->first();
            if($village == null){
                  return false;
            }else{
                  return true;
            }
      }

      public function checkZoneExist($zone_name){
            $zone = Zone::where("localisation",$zone_name)->first();
            if($zone == null){
                  return false;
            }else{
                  return true;
            }
      }

      public function checkZoneWithIdentifiant($identif){
            $zone = Zone::where("identifiant",$zone_identifname)->first();
            if($zone == null){
                  return false;
            }else{
                  return true;
            }
      }

      public function checkZoneHasDelegue($zone_name){
            $zone = Zone::where("localisation",$zone_name)->first();
            $membres =  $zone->membres;
            $flag = false;
            $i=0;
            while($flag == false &&  $i < $membres->count()){
                  if($membres->offsetGet($i)->deleguate == 1){
                        $flag = true;
                  }
                  $i++;
            }
            return $flag;
      }

      public function checkMemberExist($nom){
            $mem = Membre::where('name',$nom)->first();
            if($mem == null){
                  return false;
            }else{
                  return true;
            }
      }

    public function participantCollecte($idcollecte, $participants)
    {
      $result = DB::select("
            SELECT * FROM membres
            WHERE id NOT IN
            (SELECT participantcollectes.membre_id
            FROM participantcollectes
            WHERE participantcollectes.collectefond_id = :collecte
            )
            AND zone_id IS NOT NULL;
      ", ['collecte' => $idcollecte]);

      $membres = collect();
      foreach ($result as $membre) {
            $zone = Zone::where('id', $membre->zone_id)->select("localisation")->first();
            $ligne = [
                  'matricule' => $membre->matricule,
                  'name' => $membre->name,
                  'zone' => $zone->localisation,
                  'participation' => "Non",
            ];
            $membres->push($ligne);
      }

      foreach ($participants as $pt) {
            $ligne = [
                  'matricule' => $pt->membre->matricule,
                  'name' => $pt->membre->name,
                  'zone' => $pt->membre->zone_name,
                  'participation' => "Oui",
            ];
            $membres->push($ligne);
      }
      return $membres;
    }

      public function checkEligibility(){
          /***
           * A la fin d'une collecte (statut = terminé et diff(date_debut et aujourd'hui)=3 )
           * on recupere tout ceux qui n'on pas participé (id membre n'existant pas dans participation collecte)
           * if echec = 0, echec <= 1, sanction  <= 2
           * if echec = 1, echec <= 2, sanction  <= 2
           * if echec = 0, echec <= 1, sanction  <= 2
           */
      }
}
