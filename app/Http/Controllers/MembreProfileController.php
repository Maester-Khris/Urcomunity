<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Membre;
use App\Models\User;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MembreProfileController extends Controller
{
    //
    public function index()
    {
        $membres = Membre::all();
        return view('profiles', compact('membres'));
    }

    public function delegues()
     {
         $delegues = Membre::where('deleguate',1)->get();
         return view('delegues', compact('delegues'));
     }


    public function setrole(Request $request){
        // Note: on recupere le membre on verifie si il n'a pas deja le role (relationship)
        // si il a deja un role on change le role, et celui de l'user associe
        // si il n'en a pas on lui ajoute le role et on un cree un user avec ses info et son role

        // =============================== uniquement creation des utilisateur =====================
        $request->validate([
            'nom_membre' => 'required',
            'role_membre' => 'required'
        ]);

        $membre = Membre::where('name',$request->nom_membre)->first();
        $email = Str::limit($membre->name,7);
        $email = $email . '@gmail.com';

        $user = User::create([
            'name' => $membre->name,
            'email' => $email,
            'password' => Hash::make($membre->matricule),
        ]);

        // return response()->json(["membre" => $membre]);
        return redirect('/site-managment');
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
