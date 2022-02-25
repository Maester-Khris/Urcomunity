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
      // ================ About one to one ==============
      // $user = User::find(1);
      // $userDob = $user->profile->dob;
      // $user = User::find(1);
      // $user->profile()->save($profile);
      // $user = $user->profile()->create([]);

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

    public function event(){
       $zones = Zone::pluck('localisation');
      return view ('administration',['event'=>true])->with(compact('zones'));
   }
}
