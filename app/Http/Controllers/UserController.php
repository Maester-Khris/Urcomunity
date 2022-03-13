<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Membre;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function connect(Request $request){
        $request->validate([
            'nom_membre' => ['required'],
            'matricule_membre' => ['required'],
        ]);
        $membre = Membre::where('name',$request->nom_membre)->where('matricule',$request->matricule_membre)->first();
        $user = $membre->user;
        // dd($user);

        if($request->remember == "yes"){
            Auth::login($user, $remember = true);
            $request->session()->regenerate();
        }else{
            Auth::login($user);
            $request->session()->regenerate();
        }
        return redirect('site-managment');
    }

    public function deconnect(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('accueil');
    }

}
