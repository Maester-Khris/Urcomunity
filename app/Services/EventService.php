<?php
namespace App\Services;

use DateTime;
use App\Models\Media;
use App\Models\Zone;
use App\Models\Membre;
use App\Models\Evenement;
use App\Models\Collectefond;
use App\Models\Participantcollecte;
use Illuminate\Support\Facades\DB;

class EventService{

    public function newEvent($input, $file)
    {

        $membre = Membre::where('name', $input['membre'])->first();
        $event = $membre->event()->create([
            'titre' => $input['titre'],
            'qualificatif' => $input['qualificatif'],
            'description' => $input['description'],
            'statut' => 0,
            'nombre_vues' => 0,
        ]);

        if ($file != null) {
            foreach ($file['filenames'] as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . $key . '.' . $extension;
                $file->move('uploads/events/', $filename);

                $media = new Media;
                $media->url_destination = $filename;
                $event->medias()->save($media);
            }
        }

    }

    public function eventDetail($event, $membre)
    {
        //-id des events precedent et suivant
        $prec = ($event->id == 1) ? $event->id : $event->id - 1;
        $suiv = ($event->id == Evenement::all()->count()) ? $event->id : $event->id + 1;

        // -zone du membre
        $membre_zone = $membre->zone->localisation;

        // number od days since the events
        $date_event = new DateTime($event->created_at);
        $today = new DateTime();
        $interval = $date_event->diff($today);
        $final_days = $interval->format('%a');

        $details = [
            "prec" => $prec,
            "suiv" => $suiv,
            "membre_zone" => $membre_zone,
            "final_days" => $final_days,
        ];
        return $details;
    }

     /**
     * 01: pas encore eligble pour cotisation heureuse
     * 02: pas encore eligble pour cotisation malheureuse
     * 11: eligble pour cotisation heureuse
     * 12: eligble pour cotisation malheureuse
     * 0: membre non participant
    */
    public function checkMemberEligibleForFund(Membre $membre, Evenement $event, Collectefond $fund){
        $today = new DateTime();
        $date_inscription = new DateTime($membre->registered_date);
        $interval = $date_inscription->diff($today);
        $final_year = $interval->format('%m');
        $final_month = $interval->format('%m');
        
        if($final_year >= 1){
            $final_month = $final_month + (12 * $final_year);
        }
  
        if($membre->zone_id == null || $membre->statut == 0){
            return "0";
        }

        $test_existing_participation = Participantcollecte::where('collectefond_id',$fund->id)
        ->where('membre_id',$membre->id)
        ->first();
        if($test_existing_participation != null){
            return "0";
        }

        if($event->qualificatif == "Heureux"){
            if($final_month >= 3 && $membre->partcipation_heureuse >= 6){
                return "11";
            }else{
                return "01";
            }
        }
        else if($event->qualificatif == "Malheureux"){
            if($final_month >= 2 && $membre->partcipation_malheureuse >= 3){
                return "12";
            }else{
                return "02";
            }
        }
    }

    /**
     * 1: eligible
     * 2: existing fund found for this event
     * 3: event not foun
    */
    public function checkEventEligibleForFund($titre){
        $event = Evenement::where('titre',$titre)->whereNotNull('date_acceptation')->where('statut',1)->first();
        if($event != null){
            $res = $this->checkExistingFundforEvent($event->id);
            if($res == 1){
                return 1;
            }
            return 2;
        }else{
            return 3;
        }
    }

    public function checkExistingFundforEvent($eventid){
        $existingfund = Collectefond::all()->where('evenement_id',$eventid)->count();
        if($existingfund == 0){
            return 1;
        }else{
            return 0;
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
           AND zone_id IS NOT NULL
           AND name <> 'Fire Admin ';
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
}
