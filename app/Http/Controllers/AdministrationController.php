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

    public function index()
    {

      // $nonparticipants = Membre::with('zone')
      //    ->leftjoin('participantcollectes','participantcollectes.membre_id','=','membres.id')
      //    ->whereNull('participantcollectes.membre_id')
      //    ->join('collectefonds','collectefonds.id','=','participantcollectes.collectefond_id')
      //    ->where('collectefonds.statut','En cours')
      //    ->get()
      //    ;


      // ============================= Validé ===================================================

      // astuce: pour autre requete changer en cours par id collecte
      // membre n'ayant pas encore participé a la collecte en Cours

   //   $membres = Membre::with('user')->get();
   //   //dd($membres->user->getRoleNames());

   //    // participant de la collecte en cours
   //    
   //    // dd($participants);

   //    // participant de la collecte en cours
   //    

   //    // a modifier plustoard pour tenir en compte le statut caclculé "en cours"
   //    $collectes = Collectefond::all();

   //    // collecte en cour
   //    

   //    // event elligle pour rajouter a une collecte
   //    

   //    // event à valider
   //   
   // : 
   // 
   /** NOTE
    * lorsqu'on reinitialise un compte si celui si avait un role on l'enleve
    * il ne doit pas y avoir deux personne avec un meme role suaf si ce role c'est membre
    * avant d'ajouter quelqu'un delege de sa zone on verifie que cete zone n'a pas deja de delege
    */

      // variable par ordre d'utilisation
      $zones = Zone::withCount('membres')->orderBy('localisation','asc')->get();
      $bureaux = Role::where('name','LIKE','B%')->select("name")->get();
      $sages = Role::where('name','LIKE','C%')->select("name")->get();
      $membres = Membre::with('user')->whereNotNull('zone_id')->get();
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
         ->with(compact('participants'))
         ->with(compact('beneficiaires'));
         // 
         // 
         // 
         // // ->with(compact('nonparticipants'))
         // 

         // ;
   }

}
