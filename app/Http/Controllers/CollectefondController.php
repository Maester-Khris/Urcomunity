<?php

namespace App\Http\Controllers;

use Date;
use DateTime;
use Illuminate\Http\Request;

use App\Models\Membre;
use App\Models\Zone;
use App\Models\Evenement;
use App\Models\Collectefond;
use App\Services\EventService;
use App\Services\MemberService;
use Illuminate\Support\Facades\DB;


class CollectefondController extends Controller
{
   private $eventservice;
   private $membres;
   public function __construct(EventService $eventservice, MemberService $membres)
   {
      $this->eventservice = $eventservice;
      $this->membres = $membres;
   }

   public function index(){

      $collecte_en_cour = Collectefond::with('evenement')->where('statut','En Cours')->first();
      $macollecte = Collectefond::with('participants.membre')->where('statut','En Cours')->first();
      $participants = $macollecte == null ? null : $macollecte->participants;
      $nbparticipants = count($participants);
      $participants_final = $this->participantCollecte($macollecte->id, $participants);
      
      return view('collecte')
         ->with(compact('collecte_en_cour'))
         ->with(compact('participants_final'))
         ->with(compact('nbparticipants')) ;
   }

   public function launchfund(Request $request){
      $result = $this->eventservice->checkEventEligibleForFund($request->titre);
      if($result == 2){
         $collect_error = "Impossible de lancer une collecte!, Collecte trouvée pour cet evenement";
         return back()->with('error_menu',$collect_error);
      }else if($result == 3){
         $collect_error = "Impossible de lancer une collecte!, Evenement non reconnu ou rejeté";
         return back()->with('error_menu',$collect_error);
      }

      if($result == 1){
         $event = Evenement::with('membre')->where('titre',$request->titre)->first();
         $newfund = Collectefond::create([
            "evenement_id" => $event->id,
            "date_lancement" => date("Y-m-d"),
            "delai_envoi_participation" => 3,
            "statut" => "En cours",
            "montant_cotisation" => $request->montant
         ]);

         // ajouter le proprietaire de l'event comme beneficiaire de cette collecte
         $newfund->beneficiaires()->create([
            'membre_id' => $event->membre->id,
            'collectefond_id' => $newfund->id
         ]);
      }
      return redirect('/site-managment');
   }

   public function mixeventforfund(Request $request){
      $fund = Collectefond::find($request->collecte);
      $evenement = Evenement::with('membre')->where('titre',$request->nouvel_event)->first();
      $fund->beneficiaires()->create([
         'membre_id' => $evenement->membre->id,
         'collectefond_id' => $fund->id
      ]);
      return redirect('/site-managment');
   }

   /**
    * verifie que le membre existe 
    * si il existe on verifie qu'il n'a pas ete supprimé(retireé d'une zone) ou desactive
    * on verifie si cette collecte existe, si elle existe et elle est activ
    * apres avoir enregistrer la participation on augmente les compteur de participations
    */
   public function addparticipationforfund(Request $request){
      $test = $this->membres->checkMemberExistByMatricule($request->membre_matricule);
      if($test == false){
         $collect_error = "Membre non reconnu, verifiez le matricule";
         return back()->with('error_menu',$collect_error);
      }else{
         $fund = Collectefond::find($request->collecte);
         $event = Evenement::find($fund->evenement_id);
         $membre = Membre::where('matricule',$request->membre_matricule)->first();
         $result = $this->eventservice->checkMemberEligibleForFund($membre, $event, $fund);

         if($fund->statut == 'En cours'){
            if($result == "11" || $result == "12"){
               $fund->participants()->create([
                  'membre_id' => $membre->id,
                  'collectefond_id' => $fund->id
               ]); 
               if($result== "11"){
                  $membre->partcipation_heureuse = $membre->partcipation_heureuse + 1;
               }
               if($result== "12"){
                  $membre->partcipation_malheureuse = $membre->partcipation_malheureuse + 1;
               }
               $membre->save();
               return redirect('/site-managment');
            }
            else if($result== "01" || $result== "02"){
               $collect_error = "Désolé, ce membre n'est pas eligble, veuillez respecter les criteres";
               return back()->with('error_menu',$collect_error);
            }else{
               $collect_error = "Désolé, ce membre est desactivé ou a déja participé";
               return back()->with('error_menu',$collect_error);
            }
         }else{
            $collect_error = "Désolé, Cette collecte n'est plus active";
            return back()->with('error_menu',$collect_error);
         }
      }
   }

   public function participantCollecte($idcollecte, $participants){
      $membres = $this->eventservice->participantCollecte($idcollecte, $participants);
      return $membres;
   }

}
