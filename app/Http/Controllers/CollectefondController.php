<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Collectefond;
use App\Models\Membre;
use Date;
use DateTime;

class CollectefondController extends Controller
{
    //
    // eligible event for fund
    // - event dateacceptation not null
    // - event statut 1: accepted
    // -aucune cotisation lié a cet evenement deja en cours ou deja passé - ligne existante dans cotisations
    // cree une nouvelle ligne collectefonds
    // on recupere l'event passé en input
    // 'taux_cautisation' => ($request->qualificatif == "Heureux") ? 500 : 1000,
    // ajoute le properietaire de l'evenement comme beneficiaire

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

      $fund = Collectefond::find($request->collecte);
      $evenement = Evenement::with('membre')->where('titre',$request->nouvel_event)->first();
      $fund->beneficiaires()->create([
         'membre_id' => $evenement->membre->id,
         'collectefond_id' => $fund->id
      ]);
      return redirect('/site-managment');

      // pour recuperer la liste des participants penser a faire du distinct
   }

   public function addparticipationforfund(Request $request){
      $membre = Membre::where('name',$request->membre)->first();
      $fund = Collectefond::find($request->collecte);
      // dd($membre);
      // dd($fund);
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

   // // lorsque la collecte est passé on recherche la collecte par le nom de son evenemeent
   // $collecte = Collectefond::whith(['evenement' => function($query){
   //    $query->where('titre','')
   // }])->get($nonparticipants);
}
