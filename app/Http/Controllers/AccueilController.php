<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function index()
    {
        return view('acceuil');
        // return view('pages.Parametre.article',[
        //     'articles'=>$articles
        // ]);
    }
}
