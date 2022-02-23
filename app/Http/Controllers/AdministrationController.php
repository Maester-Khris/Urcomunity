<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Membre;

class AdministrationController extends Controller
{
    //
    public function index()
    {
       // get the members of a particular zones
       // $zone = Zone::find(1);
       // $membres = $zone->membres;
       // dd($membres);
       //
       // // retrieve the zone of a particular member
       // $membre = Membre::find(1);
       // $zone = $membre->zone;
       // dd($zone);
       // echo $zone->localisation;

       $zones = Zone::pluck('localisation');
       return view('administration', compact('zones'));
    }
}
