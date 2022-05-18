<?php

namespace App\Http\Controllers;

use Date;
use Validator;
use App\Models\Membre;
use App\Models\Evenement;
use App\Services\DataService;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
   private $eventservice;
   private $data;
   public function __construct(EventService $eventservice, DataService $data)
   {
      $this->eventservice = $eventservice;
      $this->data = $data;
   }

   function list() {
      $events = Evenement::paginate(3);
      return view('evenements')->with(compact('events'));
   }

   public function create(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'titre' => 'required',
         'qualificatif' => 'required',
         'membre' => 'required',
         'description' => 'required',
         'filenames' => 'required',
         'filenames.*' => 'mimes:png,jpeg,jpg',
      ]);
      if ($validator->fails()) {
         $transf_error = "Formulaire mal remplie";
         return back()->with('error_menu',$transf_error);
      }
      if($this->data->checkMemberExist($request->membre) == false){
         $memb_error = "Membre non reconnu, verifiez le nom";
         return back()->with('error_menu',$memb_error);
      }

      $this->eventservice->newEvent($request->input(), $request->file());
      return redirect('/site-managment');
   }

   public function eventvalidate(Request $request)
   {
      $event = Evenement::where('titre', $request->titre)->first();
      $today = date("Y-m-d");
      $event->statut = $request->statut;
      $event->date_acceptation = $today;
      $event->save();
      return response()->json(['success' => 'Ajax request submitted successfully']);
   }

   public function addOneView(Request $request)
   {
      $id = intval($request->eventid);
      $event = Evenement::find($id);
      $event->nombre_vues = $event->nombre_vues + 1;
      $event->save();
      return response()->json(['success' => "view added"]);
   }

   public function voir(Evenement $event)
   {
      $medias = $event->medias;
      $membre = Membre::find($event->membre_id);
      $others = $this->eventservice->eventDetail($event, $membre);

      $details = [
         "id" => $event->id,
         "titre" => $event->titre,
         "qualificatif" => $event->qualificatif,
         "description" => $event->description,
         "vues" => $event->nombre_vues,
         "membre_name" => $membre->name,
         "membre_photo" => $membre->url_photo,
         "membre_zone" => $others['membre_zone'],
         "interval_jour" => $others['final_days'],
         "prec" => $others['prec'],
         "suiv" => $others['suiv'],
         "medias" => $medias,
      ];
      return view('evenement-detail', compact('details'));
   }

}
