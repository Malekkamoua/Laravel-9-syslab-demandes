<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class demandesController extends Controller
{
     public function getAlldemandes() {
        $user = Auth::user();

        if($user->role == "admin") {
            $demandes = Demande::orderBy('created_at', 'DESC')->paginate(25);
        } else{
            $demandes = Demande::where('user_id', $user_id)->paginate(25);
        }

        return view('demandes', [
            'demandes' => $demandes
        ]);
    }

     public function create(Request $request) {

        $analyses = Analyse::all();

        return view('demande-add', [
            'analyses' => $analyses
        ]);
    }

     public function store(Request $request){
        $user = Auth::user();

        $demande = new Demande;

        //Info patient
        $demande->nom = $request->input('nom');
        $demande->prenom = $request->input('prenom');
        $demande->sexe = $request->input('sexe');
        $demande->ddn = $request->input('ddn');
        $demande->num_carte = $request->input('num_carte');
        $demande->num_dossier = $request->input('num_dossier');

        //Info analyses
        $demande->analyses = json_encode($request->input('analyses'));
        $demande->date_prelev = $request->input('date_prelev');
        $demande->type_dossier = $request->input('type_dossier');
        $demande->nb_tubes = $request->input('nb_tubes');
        $demande->t_ambiante = $request->input('t_ambiante');
        $demande->t_ref = $request->input('t_ref');
        $demande->t_cong = $request->input('t_cong');

        //Info trisomie
        $demande->poids = $request->input('poids');
        $demande->taille = $request->input('taille');
        $demande->ddr = $request->input('ddr');
        $demande->ddg = $request->input('ddg');
        $demande->nb_foetus = $request->input('nb_foetus');

        //Autres
        $demande->commentaires = $request->input('commentaires');

        $analyses_req = $request->input('analyses');

        $analyses_db_array = [];

        foreach ($analyses_req as $analyse) {
            $analyse_db = Analyse::where('code', $analyse)->first();
            array_push($analyses_db_array, $analyse_db->code);
        }

        $demande->analyses = json_encode($analyses_db_array);
        $demande->user_id = $user->id;

        $demande->save();

        $demandes = Demande::orderBy('created_at', 'DESC')->paginate(25);

        return view('demandes', [
            'demandes' => $demandes
        ]);
    }

    public function edit(Request $request, $id) {


        $demande = Demande::find($id);

        if($demande->etat_dossier == "en cours") {
                $demande->etat_dossier = 'final';
                $demande->save();
            }

        $analyses_all = Analyse::all();

        $analyses_db_array = [];

        foreach (json_decode($demande->analyses) as $analyse) {
            $analyse_db = Analyse::where('code', $analyse)->first();
            array_push($analyses_db_array, $analyse_db);
        }

        return view('demande-edit', [
            'demande' => $demande,
            'selected_analyses' => $analyses_db_array,
            'analyses' => $analyses_all,
            ]);
    }

    public function update(Request $request, $id){
        $user = Auth::user();

        $demande = Demande::findOrFail($id);

        //Info patient
        $demande->nom = $request->input('nom');
        $demande->prenom = $request->input('prenom');
        $demande->sexe = $request->input('sexe');
        $demande->ddn = $request->input('ddn');
        $demande->num_carte = $request->input('num_carte');
        $demande->num_dossier = $request->input('num_dossier');

        //Info analyses
        $demande->date_prelev = $request->input('date_prelev');
        $demande->type_dossier = $request->input('type_dossier');
        $demande->nb_tubes = $request->input('nb_tubes');
        $demande->t_ambiante = $request->input('t_amb');
        $demande->t_ref = $request->input('t_ref');
        $demande->t_cong = $request->input('t_cong');

        //Info trisomie
        $demande->poids = json_encode($request->input('poids'));
        $demande->taille = $request->input('taille');
        $demande->ddr = $request->input('ddr');
        $demande->ddg = $request->input('ddg');
        $demande->nb_foetus = $request->input('nb_foetus');

        //Autres
        $demande->commentaires = $request->input('commentaires');
        $analyses_req = $request->input('analyses');

        $analyses_db_array = [];

        foreach ($analyses_req as $analyse) {
            $analyse_db = Analyse::where('code', $analyse)->first();
            array_push($analyses_db_array, $analyse_db->code);
        }

        $demande->analyses = json_encode($analyses_db_array);

        $demande->user_id = $user->id;
        $demande->save();

        $demandes = Demande::orderBy('created_at', 'DESC')->paginate(25);

        return view('demandes', [
            'demandes' => $demandes
        ]);
    }

    public function findeById($id) {

        $demande = Demande::findOrFail($id);

        return view('demande', [
            'demande' => $demande
        ]);
    }

     public function findeByStatus() {

        $demandes = Demande::where('etat_dossier', $etat_dossier)->paginate(25);

        return view('demandes', [
            'demandes' => $demandes
        ]);
    }

      public function delete($id) {

        $demande = Demande::findOrFail($id);
        $demande->delete();

        return back()->with('success','Demande supprimés avec succés');
    }
}
