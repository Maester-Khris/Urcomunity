<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Services\DataService;


class ZoneController extends Controller
{
    private $data;
    public function __construct(DataService $data)
    {
        $this->data = $data;
    }

    public function index()
     {
        $zones = Zone::with('membres')->get();;
        return view('zones', compact('zones'));
     }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'localisation' => 'required',
            'identifiant' => 'required',
        ]);
        if ($validator->fails()) {
            $transf_error = "Formulaire mal remplie";
            return back()->with('error_menu',$transf_error);
        }
        if($this->data->checkZoneExist($request->zone) == true){
            $transf_error = "une zone avec cet identifiant existe déja";
            return back()->with('error_menu',$transf_error);
        }
        Zone::create($request->all());
        return redirect('/site-managment');
    }
}
