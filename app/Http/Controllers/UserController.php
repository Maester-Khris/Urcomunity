<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Membre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function connect(Request $request){
        $validator = Validator::make($request->all(), [
            'nom_membre' => ['required'],
            'matricule_membre' => ['required'],
        ]);
        if ($validator->fails()) {
            $transf_error = "Formulaire mal remplie";
            return back()->with('error_login',$transf_error);
        }

        $membre = Membre::where('name',$request->nom_membre)->where('matricule',$request->matricule_membre)->first();
        // cherche si il existe un user avec ce nom et si il a des roles
        $user_exist = User::where('name',  $membre->name)->first();
        if($user_exist == null || $user_exist->getRoleNames()->count() == 0){
            $transf_error = "Utilisateur non reconnu, verifier les identifiants";
            return back()->with('error_login',$transf_error);
        }else{
            $user = $membre->user;
            if($request->remember == "yes"){
                Auth::login($user, $remember = true);
                $request->session()->regenerate();
            }else{
                Auth::login($user);
                $request->session()->regenerate();
            }
            return redirect('site-managment');
        }
    }

    public function deconnect(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('accueil');
    }

}
