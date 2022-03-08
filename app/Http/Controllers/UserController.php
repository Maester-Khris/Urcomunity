<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function connect(Request $request){
        $request->validate([
            'nom_membre' => ['required'],
            'matricule_membre' => ['required'],
        ]);
        $user = User::where('name',$request->nom_membre)->first();

        if($request->remember == "yes"){
            Auth::login($user, $remember = true);
        }else{
            Auth::login($user);
        }
        return redirect('site-managment');
    }

    public function deconnect(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('accueil');
    }

}
