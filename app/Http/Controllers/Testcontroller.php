<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    public function create_memb_user_account(){
        $members = Membre::all();
        foreach($members as $mem){
            $user_exist = User::where("name",$mem->name)->exists();
            if(!$user_exist){
                $email = Str::limit($mem->name,7);
                $email = $email . '@gmail.com';
                $user = User::create([
                    'name' => $mem->name,
                    'email' => $email,
                    'url_photo' => $mem->url_photo,
                    'password' => Hash::make($mem->matricule),
                ]);
            }
        }
    }
}
