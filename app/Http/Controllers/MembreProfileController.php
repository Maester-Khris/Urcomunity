<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Membre;

class MembreProfileController extends Controller
{
    //
    public function index()
    {
        $membres = Membre::all();
        return view('profiles', compact('membres'));
    }

    public function create(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'zone' => 'required',
            'telephone' => 'required',
            'deleguate' => 'required',
            'registered_date' => 'required'
        ]);
        $membre = new Membre;
        $membre->name=$request['name'];
        $membre->telephone=$request['telephone'];
        $membre->deleguate=$request['deleguate'];
        $membre->registered_date=$request['registered_date'];
        $membre->matricule='MAAERRF';
        $membre->statut=1;

       // Saving related model
        $zone = Zone::where('localisation',$request['zone'])->first();
        $zone->membres()->save($membre);


        return redirect('/site-managment');
    }
}
