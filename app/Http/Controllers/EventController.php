<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Evenement;
use App\Models\Media;

class EventController extends Controller
{
    //
    public function list()
    {
        return view('evenements');
    }

    public function voir()
    {
        return view('evenement-detail');
    }

    public function create(Request $request){
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
         'taux_cautisation' => ($request->qualificatif == "Heureux") ? 500 : 1000,
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
