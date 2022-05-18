<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\DataService;
use App\Services\MemberService;
use Validator;

class MembreProfileController extends Controller
{

    private $membres;
    private $data;
    public function __construct(MemberService $membres, DataService $data)
    {
        $this->membres = $membres;
        $this->data = $data;
    }

    public function index()
    {
        $membres = Membre::whereNotNull('zone_id')->where('name', '!=', 'Fire Admin')->get();
        return view('profiles', compact('membres'));
    }

    public function delegues()
    {
        $delegues = Membre::where('deleguate', 1)->get();
        return view('delegues', compact('delegues'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'zone' => 'required',
            'village' => 'required',
            'telephone' => 'required',
            'deleguate' => 'required',
            'cni' => 'required',
            'registered_date' => 'required',
            'filename' => 'required',
            'filename.*' => 'mimes:png,jpeg,jpg',
        ]);
        if ($validator->fails()) {
            $transf_error = "Formulaire mal remplie";
            return back()->with('error_menu',$transf_error);
        }
        if($this->data->checkZoneExist($request->zone) == false){
            $transf_error = "Zone non reconnu, verifiez le champ";
            return back()->with('error_menu',$transf_error);
        }
        if($this->data->checkVillageExist($request->village) == false){
            $transf_error = "Village non reconnu, verifiez le champ";
            return back()->with('error_menu',$transf_error);
        }
        if($request->deleguate == true && $this->data->checkZoneHasDelegue($request->zone) == true){
            $transf_error = "Désole, cette zone a deja un delegué";
            return back()->with('error_menu',$transf_error);
        }

        $this->membres->registerMemb($request->input(), $request->file(), null);
        return redirect('/site-managment');
    }

    /***
     *  Note: si il a deja un role changer de role et de permission
     * on un cree un user avec ses info son role et sa permision
     */
    public function setrole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_membre' => 'required',
            'role_membre' => 'required',
        ]);
        if ($validator->fails()) {
            $transf_error = "Formulaire mal rempli";
            return back()->with('error_menu',$transf_error);
        }
        if($this->membres->checkMemberExist($request->nom_membre) == false){
            $memb_error = "Membre non reconnu, verifiez le nom";
            return back()->with('error_menu',$memb_error);
        }
        if($this->data->checkRoleExist($request->role_membre) == false){
            $memb_error = "Role non reconnu, verifiez le champ role";
            return back()->with('error_menu',$memb_error);
        }
        if($request->role_membre == "Delege"){
            $membre = Membre::where("name", $request->nom_membre)->first();
            if($this->data->checkZoneHasDelegue($membre->zone->localisation) == true){
                $transf_error = "Désole, cette zone a deja un delegué";
                return back()->with('error_menu',$transf_error);
            }
        }

        $this->membres->newRole($request->input());
        return redirect('/site-managment');
    }

    public function resetaccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricule' => 'required',
            'name' => 'required',
            'zone' => 'required',
            'village' => 'required',
            'telephone' => 'required',
            'cni' => 'required',
            'registered_date' => 'required',
            'deleguate' => 'required',
            'filename' => 'required',
            'filename.*' => 'mimes:png,jpeg,jpg',
        ]);
        if ($validator->fails()) {
            $transf_error = "Formulaire mal remplie";
            return back()->with('error_menu',$transf_error);
        }
        if($this->data->checkZoneExist($request->zone) == false){
            $transf_error = "Zone non reconnu, verifiez le champ";
            return back()->with('error_menu',$transf_error);
        }
        if($this->data->checkVillageExist($request->village) == false){
            $transf_error = "Village non reconnu, verifiez le champ";
            return back()->with('error_menu',$transf_error);
        }
        if($this->data->checkZoneHasDelegue($request->zone) == true){
            $transf_error = "Désole, cette zone a deja un delegué";
            return back()->with('error_menu',$transf_error);
        }

        // on retire le membre ed l'ancienne zone et supprime l'user y associé au cas echeant
        $old_membre = Membre::where('matricule', $request->matricule)->first();
        $user_exist = User::where('name', $old_membre->name)->first();
        if ($user_exist != null) {
            $user_exist->removeRole($user_exist->roles->first());
            $user_exist->delete();
        }

        $this->membres->registerMemb($request->input(), $request->file(), $old_membre->matricule);
        $old_membre->statut = 0;
        $old_membre->deleguate = 0;
        $old_membre->zone()->dissociate();
        $old_membre->save();
        return redirect('/site-managment');
    }

    public function toggleActivate(Request $request){
        $result = $this->membres->toggleActivation($request->matricule);
        if($result == 1){
            $message = "Statut du membre changé avec succès";
            return response()->json(['reponse' => $message ]);
        }
    }

    public function removeRole(Request $request){
        $result = $this->membres->DropRole($request->matricule, $request->role);
        if($result == 1){
            $message = "Role retiré avec succès";
            return response()->json(['error' => $message ]);
        }else if($result == 0){
            $error = "Erreur lors de la suppression du role";
            return response()->json(['error' => $error ],400);
        }
        else if($result == 00){
            $error = "utilsateur non trouvé";
            return response()->json(['error' => $error ],400);
        }
    }

    public function getLastInfos(Request $request){
        $test = $this->membres->checkMemberExistByMatricule($request->membre_matricule);
        if($test == false){
            $matricule_error = "Membre non reconnu, verifiez le matricule";
            return response()->json(['error' => $matricule_error ],400);
        }else{
            $membre = Membre::where('matricule',$request->membre_matricule)->first();
            $info=[
                "nom" =>  $membre->name,
                "telephone" => $membre->telephone,
                "numero_cni" => $membre->numero_cni
            ];
            return response()->json(['last_infos' => $info]);
        }
        
    }

}
