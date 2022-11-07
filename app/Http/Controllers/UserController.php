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
    public function loginpage(){
        return view('auth.login');
    }

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
        $user_exist = User::where('name',  $membre->name)->first();

        if($user_exist == null || $user_exist->getRoleNames()->count() == 0){
            $transf_error = "Utilisateur non reconnu, verifier les identifiants";
            return back()->with('error_login',$transf_error);
        }else{
            if($request->remember == "yes"){
                Auth::login($membre->user, $remember = true);
                $request->session()->regenerate();
            }else{
                Auth::login($membre->user);
                $request->session()->regenerate();
            }

            $mem_names = explode(' ', $membre->name);
            $mem_name = $mem_names[0] .' '. $mem_names[1];
            session()->put('membre_id', $membre->id);
            session()->put('membre_name', $mem_name);

            return redirect()->route('accueil')->with('message', 'Connexion réussi.');
            // return redirect('site-managment');
            // dd("url: ". back());
            // return back();
        }
    }

    public function deconnect(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('accueil');
    }

}
