<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Membre;
use App\Models\User;
use App\Models\Collectefond;
use Illuminate\Http\Request;
use App\Services\MemberService;
use Spatie\Permission\Models\Role;


class AccueilController extends Controller
{
    /** Note : a faire pour la finalisation 
     * 1er jour
     * ajouter un padding sur la banniere ♠
     * ajouter un favicon sur le site ♠
     * non du site sur acceuil ♠
     * faire marcher les lien sur voir la suite ♠
     * enlever poster evenement ♠
     * masquer bouton des message ♠
     * masquer bouton menu mobile quand on change d'appareil ♠
     * liste des zonen membre : copier le style de contact des delegue ♠
     * liste des zone, delegue, membre mettre a jour le titre des page ♠
     * liste des evenements: faire marcher la pagination ♠
     * revoir style lire la suite: chercher design online ♠
     * evenement detail: revoir fonction difference de jour ♠
     * evenement detail: changer couleur pour type evenement et lieux, icone utilisateur et vues ♠
     * evenement detail: augmenter nb bue a chaque fois que page est chargé ♠
     * evenemnt detail photo par defaut au cas ou rien ♠
     * memebre actif selectionner 03 membre aleatoirement et afficher et ranger par nb de participations au events
     * regler pb creation procedure stocké online
     * connexion gestion des erreurs
     */

    private $membres;
    public function __construct(MemberService $membres)
    {
        $this->membres = $membres;
    }

    public function index()
    {
        // ==================================
        
        $manager = User::whereHas('roles', function($query) {
            $query->where('name','=', 'B_President');
        })->select('name')->first();

        if($manager == null){
            $manager = User::with(['roles' => function($query){
                $query->where('name','Administrator');
            }])->select('name')->first();
        }

        $bureaux = User::whereHas('roles', function($query) {
           $query->where('name','LIKE', 'B_%');
        })->get();

        $mem_bureaux = collect();
        foreach($bureaux as $bureau){
            if($bureau->getRoleNames() != null){
                $mem_bureaux->push($bureau);
            }else{
                $mem_bureaux = null;
            }
        }

        $event_abstract = Evenement::orderBy('nombre_vues','desc')->take(3)->select('titre','description','nombre_vues')->get();
        $events = Evenement::with('membre.zone')->orderBy('created_at','desc')->get();
        $collecte_en_cour = Collectefond::with('evenement')->where('statut','En Cours')->first();

        return view('acceuil')
            ->with(compact('manager'))
            ->with(compact('mem_bureaux'))
            ->with(compact('event_abstract'))
            ->with(compact('collecte_en_cour'))
            ->with(compact('events'));
    }
}