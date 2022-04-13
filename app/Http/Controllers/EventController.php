<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Evenement;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Date;
use DateTime;

class EventController extends Controller
{
    //
    public function list()
    {
      //  $events = Evenement::all();
      $events = Evenement::paginate(3);
       return view('evenements')->with(compact('events'));
    }

    public function eventvalidate(Request $request){
      $event = Evenement::where('titre',$request->titre)->first();
      $today = date("Y-m-d");
      $event->statut = $request->statut;
      $event->date_acceptation = $today;
      $event->save();
      return response()->json(['success'=>'Ajax request submitted successfully']);
       // return response()->json($request);
   }

   public function addOneView(Request $request){
      $id = intval($request->eventid);
      $event = Evenement::find($id);
      $event->nombre_vues = $event->nombre_vues + 1;
      $event->save();
      return response()->json(['success'=>"view added"]);
   }

    public function voir(Evenement $event)
    {
        //-id des events precedent et suivant
        $prec = ($event->id == 1) ? $event->id : $event->id - 1;
        $suiv = ($event->id ==  Evenement::all()->count()) ? $event->id : $event->id + 1;
        $medias = $event->medias;

        // -zone du membre
        $membre = Membre::find($event->membre_id);
        $membre_zone =  $membre->zone->localisation;

        // number od days since the events
        $date_event = new DateTime($event->created_at);
        $today = new DateTime();
        $interval = $date_event->diff($today);
        $final_days = $interval->format('%a');

        $details = [
           "id" => $event->id,
           "titre" => $event->titre, 
           "qualificatif" => $event->qualificatif,
           "description" => $event->description,
           "interval_jour" => $final_days,
           "vues" => $event->nombre_vues,
           "prec" => $prec,
           "suiv" => $suiv,
           "medias" => $medias,
           "membre_name" => $membre->name,
           "membre_zone" => $membre_zone,
           "membre_photo" => $membre->url_photo
        ];

        return view('evenement-detail',compact('details'));
      // ->with('details', $details);
    }

    public function create(Request $request){
      // integrer les conditions pour declarer un evenement
      $request->validate([
         'titre' => 'required',
         'qualificatif' => 'required',
         'membre' => 'required',
         'description' => 'required',
         'filenames' => 'required',
         'filenames.*' => 'mimes:png,jpeg,jpg'
      ]);

      $membre = Membre::where('name',$request->membre)->first();
      $event = $membre->event()->create([
         'titre' => $request->titre,
         'qualificatif' => $request->qualificatif,
         'description' => $request->description,
         'statut' => 0,
         'nombre_vues' => 0
      ]);

      if($request->hasfile('filenames')){
         foreach($request->file('filenames') as $key => $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() . $key . '.' .$extension;
            $file->move('uploads/events/', $filename);

            $media = new Media;
            $media->url_destination= $filename;
            $event->medias()->save($media);
         }
      }

      return redirect('/site-managment');
    }
}

// ->join(DB::raw('
//       SELECT COUNT(id) AS nbparticipations, membre_id FROM participantcollectes where membre_id = membres.id
// '), "participantcollectes.membre_id","membres.id")
// ->addBinding($locationId, 'select')
// ->join('participantcollectes', function($query) {
//    $query->on('participantcollectes.membre_id','membres.id')
//    ->where('participantcollectes.membre_id', 'membres.id')
//    -select('COUNT(id) AS nbparticipations, membre_id');
// })
   
//   $result = DB::raw('SELECT COUNT(id) AS nbparticipations, membre_id FROM participantcollectes where membre_id = :id',["id" => $member->id]);


// foreach($membres as $mb){
//    $result = DB::table('participantcollectes')
//    ->select(DB::raw('count(*) as nbparticipations, membre_id'))
//    ->where('membre_id', $mb->id)
//    ->groupBy('membre_id')
//    ->get();
//    // dd($result);

//    if($result != null){
//       $mbr = [
//          "nom" => $mb->name,
//          "participation" => $result->nbparticipations
//       ];
//       $actifs.push($mbr);
//    }
// }
// dd($actifs);

  // 03 randoms membres
//   $actifs = collecte();
//   $membres = Membre::where('statut',1)->inRandomOrder()->limit(3)->get();
//   dd($membres);