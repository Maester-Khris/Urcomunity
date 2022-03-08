<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Evenement;
use App\Models\Media;
use Date;
use DateTime;

class EventController extends Controller
{
    //
    public function list()
    {
       $events = Evenement::all();
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

    public function voir(Evenement $event)
    {
        // donné a envoyer:
        // -id des events precedent et suivant
        $prec = ($event->id == 1) ? $event->id : $event->id - 1;
        $suiv = ($event->id ==  Evenement::all()->count()) ? $event->id : $event->id + 1;
        // -lien des media de l'evenements
        $medias = $event->medias;
        // -zone du membre
        $membre = Membre::find($event->membre_id);
        $membre_zone =  $membre->zone->localisation;
        // number od days since the events
        $date_event = new DateTime($event->date_acceptation);
        $today = new DateTime();
        $interval = $date_event->diff($today);
        $final_days = $interval->format('%a');
        $details = [
           "titre" => $event->titre,
           "qualificatif" => $event->qualificatif,
           "description" => $event->description,
           "interval_jour" => $final_days,
           "prec" => $prec,
           "suiv" => $suiv,
           "medias" => $medias,
           "membre_name" => $membre->name,
           "membre_zone" => $membre_zone,
        ];
        // dd($details);
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
          'filenames.*' => 'mimes:png,jpeg'
      ]);

      $membre = Membre::where('name',$request->membre)->first();
      $event = $membre->event()->create([
         'titre' => $request->titre,
         'qualificatif' => $request->qualificatif,
         'description' => $request->description,
         'statut' => 0
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
