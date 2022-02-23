<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;

class ZoneController extends Controller
{
    //
    public function create(Request $request){
        $request->validate([
            'localisation' => 'required',
            'identifiant' => 'required',
        ]);

        Zone::create($request->all());
        
        // retrieve the zone of a member
        // $zone = Membre::find(1);
        // echo $zone->localisation;


        return redirect('/site-managment');
    }
}
