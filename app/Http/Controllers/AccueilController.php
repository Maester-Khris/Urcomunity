<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use App\Models\User;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function index()
    {
         $manager = User::with(['roles' => function($query){
             $query->where('name','Administrator');
         }])->select('name')->first();

        $mem_bureaux = User::with(['roles' => function($query){
           $query->where('name','LIKE','B%');
        }])->get();

        $event_abstract = Evenement::orderBy('nombre_vues','desc')->take(3)->select('titre','description','nombre_vues')->get();
        // dd($mem_bureaux);

        $events = Evenement::with('membre.zone')->get();

        return view('acceuil')
            ->with(compact('manager'))
            ->with(compact('mem_bureaux'))
            ->with(compact('event_abstract'))
            ->with(compact('events'));
    }
}
