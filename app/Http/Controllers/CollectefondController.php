<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Collectefond;
use App\Models\Membre;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;
use Date;
use DateTime;

class CollectefondController extends Controller
{

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

      $event = Evenement::with('membre')->where('titre',$request->titre)->whereNotNull('date_acceptation')->where('statut',1)->first();
      if($event != null){
         $existingfund = Collectefond::all()->where('evenement_id',$event->id)->count();

         if($existingfund == 0){
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

            return redirect('/site-managment');
         }else{
            return response()->json(['error'=>'A fund already exist for this event']);
         }

      }else{
         return response()->json(['error'=>'No such event found. Either the title was missspelled or it has not been accepted']);
      }
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

   public function addparticipationforfund(Request $request){
      $membre = Membre::where('name',$request->membre)->first();
      $fund = Collectefond::find($request->collecte);
      if($fund->statut == 'En cours'){
         $fund->participants()->create([
            'membre_id' => $membre->id,
            'collectefond_id' => $fund->id
         ]);
         return redirect('/site-managment');
      }else{
         return response()->json(['error'=>'This fund is not more active']);
      }
   }

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

    //
    // eligible event for fund
    // - event dateacceptation not null
    // - event statut 1: accepted
    // -aucune cotisation lié a cet evenement deja en cours ou deja passé - ligne existante dans cotisations
    // cree une nouvelle ligne collectefonds
    // on recupere l'event passé en input
    // 'taux_cautisation' => ($request->qualificatif == "Heureux") ? 500 : 1000,
    // ajoute le properietaire de l'evenement comme beneficiaire

   // // lorsque la collecte est passé on recherche la collecte par le nom de son evenemeent
   // $collecte = Collectefond::whith(['evenement' => function($query){
   //    $query->where('titre','')
   // }])->get($nonparticipants);

   // revient a:
      // - verifier que l'evenemnt a ajouter n'a pas deja une cotisation existance
      // - ajouter un beneficiaires a une cotisation existante
      //   - evenemnt -> membre.
      //   - cotisation -> evenemnt -> membre. celui ci est donc beneficiaire de cette cotisation

      // $existingfund = Collectefond::withCount(['evenement' => function($query){
      //    $query->where('titre', $request->nouvel_event)
      //          ->whereNotNull('date_acceptation')
      //          ->where('statut',1);
      // }])->get();
      //
      // if($existingfund == null){
      //    return response()->json(['error'=>'No such event found. Either the title was missspelled or it has not been accepted']);
      // }
      // else if($existingfund->evenement_count == 0){
      //
      // }else{
      //    return response()->json(['error'=>'A fund already exist for this event']);
      // }
}
