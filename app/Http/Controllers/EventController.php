<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function list()
    {
        return view('evenements');
    }

    public function voir()
    {
        return view('evenement-detail');
    }
}
