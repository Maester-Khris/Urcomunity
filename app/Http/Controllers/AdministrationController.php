<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Membre;
use App\Models\Evenement;
use App\Models\Collectefond;
use App\Models\Participantcollecte;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;
use Date;
use DateTime;

class AdministrationController extends Controller
{

   // ============ Note =================
   // -modification necessaire dans le code

   public function participantCollecte($idcollecte, $participants){
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
      foreach($result as $membre){
         $zone = Zone::where('id',$membre->zone_id)->select("localisation")->first();
         $ligne = [
            'matricule'  =>  $membre->matricule,            
            'name'  => $membre->name,
            'zone'  => $zone->localisation,
            'participation'  => "Non",
         ];
         $membres->push($ligne);
      }
     
      foreach($participants as $pt){
         $ligne = [
            'matricule'  =>  $pt->membre->matricule,            
            'name'  => $pt->membre->name,
            'zone'  => $pt->membre->zone_name,
            'participation'  => "Oui",
         ];
         $membres->push($ligne);
      }
      return $membres;
   }



   /** NOTE
      * lorsqu'on reinitialise un compte si celui si avait un role on l'enleve
      * il ne doit pas y avoir deux personne avec un meme role suaf si ce role c'est membre
      * avant d'ajouter quelqu'un delege de sa zone on verifie que cete zone n'a pas deja de delege
   */
   public function index()
   {
      // variable par ordre d'utilisation
      $zones = Zone::withCount('membres')->orderBy('localisation','asc')->get();
      $bureaux = Role::where('name','LIKE','B%')->select("name")->get();
      $sages = Role::where('name','LIKE','C%')->select("name")->get();
      $membres = Membre::with('user')->whereNotNull('zone_id')->where('name','!=','Fire Admin')->get();
      $events = Evenement::with('membre')->whereNull('date_acceptation')->get();
      $collecte_en_cour = Collectefond::with('evenement')->where('statut','En Cours')->first();
      $collectes = Collectefond::where('statut','En cours')->get();
      $eventforfunds = Evenement::select('titre')
         ->whereNotNull('date_acceptation')
         ->where('evenements.statut',1)
         ->join('collectefonds','collectefonds.evenement_id','!=','evenements.id')
         ->get();
      $macollecte = Collectefond::with('participants.membre')->where('statut','En Cours')->first();
      $participants = $macollecte == null ? null : $macollecte->participants;
      if($macollecte == null){
         $nbparticipants = 0;
         $participants_final = null;
      }else{
         $participants = $macollecte->participants;
         $nbparticipants = count($participants);
         $participants_final = $this->participantCollecte($macollecte->id, $participants);
      }
      

      $macollecte2 = Collectefond::with('beneficiaires.membre')->where('statut','En Cours')->first();
      $beneficiaires = $macollecte2 == null ? null : $macollecte2->beneficiaires;

      return view('administration')
         ->with(compact('zones'))
         ->with(compact('bureaux'))
         ->with(compact('sages'))
         ->with(compact('membres'))
         ->with(compact('events'))
         ->with(compact('collecte_en_cour'))
         ->with(compact('collectes'))
         ->with(compact('eventforfunds'))
         ->with(compact('participants_final'))
         ->with(compact('nbparticipants'))
         ->with(compact('beneficiaires'));
   }

}
