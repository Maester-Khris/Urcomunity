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
      // $partiforcurentfund = DB::table('participantcollectes')
      //   ->select("participantcollectes.id as participant_id","participantcollectes.membre_id","participantcollectes.collectefond_id")
      //   ->join('collectefonds', function ($join) {
      //       $join->on('participantcollectes.collectefond_id', '=', 'collectefonds.id')
      //       ->where('collectefonds.statut','En cours');
      //   });

      // $nomp = DB::table('membres')
      //             ->select("membres.id as membre_id")
      //             ->leftJoinSub($partiforcurentfund, 'participants', function($join) {
      //                $join->on('membres.id', '=', 'participants.membre_id')
      //                      // ->select("participants.id as participant_id")
      //                      ->whereNull('participants.membre_id');
      //             })->get();
      // 

      $nonparticipants = Membre::with('zone')
         ->leftjoin('participantcollectes','participantcollectes.membre_id','=','membres.id')
         ->whereNull('participantcollectes.membre_id')
         ->join('collectefonds','collectefonds.id','=','participantcollectes.collectefond_id')
         ->where('collectefonds.statut','En cours')
         ->get()
         ;
         // dd($nonparticipants);

      
      // ============================= Validé ===================================================

      // astuce: pour autre requete changer en cours par id collecte
      // membre n'ayant pas encore participé a la collecte en Cours
     
      

      // participant de la collecte en cours
      $collecte = Collectefond::with('participants.membre')->where('statut','En Cours')->first();
      $participants = $collecte == null ? null : $collecte->participants;
      // dd($participants);

      // participant de la collecte en cours
      $collecte2 = Collectefond::with('beneficiaires.membre')->where('statut','En Cours')->first();
      $beneficiaires = $collecte2 == null ? null : $collecte2->beneficiaires;

      // a modifier plustoard pour tenir en compte le statut caclculé "en cours"
      $collectes = Collectefond::all();

      // collecte en cour
      $collecte_en_cour = Collectefond::with('evenement')->where('statut','En Cours')->first();

      // event elligle pour rajouter a une collecte
      $eventforfunds =
         Evenement::select('titre')
            ->whereNotNull('date_acceptation')
            ->where('evenements.statut',1)
            ->join('collectefonds','collectefonds.evenement_id','!=','evenements.id')
            ->get();

      // role des user
      $bureaux = Role::where('name','LIKE','B%')->select("name")->get();
      // dd($bureaux);
      $sages = Role::where('name','LIKE','C%')->select("name")->get();
      // dd($sages);

      // event à valider
      $events = Evenement::with('membre')->whereNull('date_acceptation')->get();

      // liste des zones
      $zones = Zone::pluck('localisation');

      return view('administration',['nav_event'=>false])
         ->with(compact('zones'))
         ->with(compact('events'))
         ->with(compact('collectes'))
         ->with(compact('eventforfunds'))
         ->with(compact('collecte_en_cour'))
         ->with(compact('participants'))
         // ->with(compact('nonparticipants'))
         ->with(compact('beneficiaires'))
         ->with(compact('bureaux'))
         ->with(compact('sages'));
    }

   //  public function event(){
   //    $events = Evenement::with('membre')->whereNull('date_acceptation')->get();
   //    $zones = Zone::pluck('localisation');
   //    return view('administration',['nav_event'=>true])->with(compact('zones'))->with(compact('events'));
   // }


}
