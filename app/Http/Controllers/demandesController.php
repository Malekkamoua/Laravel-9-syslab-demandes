<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class demandescontroller extends Controller
{
     public function getAlldemandes() {
        $user = Auth::user();

        if($user->role == "admin") {
            $demandes = Demande::orderBy('created_at', 'desc')->paginate(25);
            $total_en_cours = sizeof(Demande::where(['etat_dossier'=> 'en cours'])->get());
            $total_final = sizeof(Demande::where(['etat_dossier'=> 'final'])->get());
            $total = sizeof(Demande::all());

        } else{
            $demandes = Demande::where(['correspondant'=> $user->id])->orderBy('created_at', 'desc')->paginate(25);
            $total_en_cours = sizeof(Demande::where(['etat_dossier'=> 'en cours', 'correspondant'=> $user->id])->get());
            $total_final = sizeof(Demande::where(['etat_dossier'=> 'final', 'correspondant'=> $user->id])->get());
            $total = sizeof(Demande::where(['correspondant'=> $user->id])->get());
        }

        return view('demandes', [
            'demandes' => $demandes,
            'en_cours' => $total_en_cours,
            'final' => $total_final,
            'total' =>$total,
            'etat' => false
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

        $demande->nb_foetus = $request->input('nb_foetus');
        $demande->type_grossesse = $request->input('type_grossesse');

        $demande->ddr = $request->input('ddr');
        $demande->ddg = $request->input('ddg');
        $demande->date_echo = $request->input('date_echo');
        $demande->age_echo_sem = $request->input('age_echo_sem');
        $demande->age_echo_jours = $request->input('age_echo_jours');

        $demande->clarte_nuc = $request->input('clarte_nuc');
        $demande->lcc = $request->input('lcc');

        //Autres
        $demande->commentaires = $request->input('commentaires');

        $analyses_req = $request->input('analyses');

        $analyses_db_array = [];

        foreach ($analyses_req as $analyse) {
            $analyse_db = Analyse::where('code', $analyse)->first();
            array_push($analyses_db_array, $analyse_db->code);
        }

        $demande->analyses = json_encode($analyses_db_array);
        $demande->correspondant = $user->id;
        $demande->code_labo = $user->code_labo;

        $demande->save();
        $demande_id = $demande->id;

        return redirect()->route('demande-edit', ['id' => $demande_id,
        'success'=>'Demande ajout??e avec succ??s'
        ])->with('success','Demande ajout??e avec succ??s');;

    }

    public function edit(Request $request, $id) {

        $user = Auth::user();

        $demande = Demande::find($id);

        if($demande->etat_dossier == "final" && $user->role == "corr") {
                $demande->etat_dossier = 'lu';
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
        $demande->poids = $request->input('poids');
        $demande->taille = $request->input('taille');

        $demande->nb_foetus = $request->input('nb_foetus');
        $demande->type_grossesse = $request->input('type_grossesse');

        $demande->ddr = $request->input('ddr');
        $demande->ddg = $request->input('ddg');
        $demande->date_echo = $request->input('date_echo');
        $demande->age_echo_sem = $request->input('age_echo_sem');
        $demande->age_echo_jours = $request->input('age_echo_jours');

        $demande->clarte_nuc = $request->input('clarte_nuc');
        $demande->lcc = $request->input('lcc');

        //Autres
        $demande->commentaires = $request->input('commentaires');
        $analyses_req = $request->input('analyses');

        $analyses_db_array = [];

        foreach ($analyses_req as $analyse) {
            $analyse_db = Analyse::where('code', $analyse)->first();
            array_push($analyses_db_array, $analyse_db->code);
        }

        $demande->analyses = json_encode($analyses_db_array);

        $demande->correspondant = $user->id;

        if($user->code_labo != null) {
            $demande->code_labo = $user->code_labo;
        }else {
            $demande->code_labo = $demande->code_labo;
        }

        $demande->save();

        return redirect()->route('demande-edit', ['id' => $demande->id
        ])->with('success','Demande mise ?? jour avec succ??s');;

    }

    public function findeById($id) {

        $demande = Demande::findOrFail($id);

        return view('demande', [
            'demande' => $demande
        ]);
    }

     public function findByStatus($etat_dossier) {

        $user = Auth::user();

        if($user->role == "admin") {
            $demandes = Demande::where(['etat_dossier'=> $etat_dossier])->orderBy('created_at', 'desc')->paginate(25);
            $total_en_cours = sizeof(Demande::where(['etat_dossier'=> 'en cours'])->get());
            $total_final = sizeof(Demande::where(['etat_dossier'=> 'final'])->get());
            $total = sizeof(Demande::all());

        } else{
            $demandes = Demande::where(['etat_dossier'=> $etat_dossier, 'correspondant'=> $user->id])->orderBy('created_at', 'desc')->paginate(25);
            $total_en_cours = sizeof(Demande::where(['etat_dossier'=> 'en cours', 'correspondant'=> $user->id])->get());
            $total_final = sizeof(Demande::where(['etat_dossier'=> 'final', 'correspondant'=> $user->id])->get());
            $total = sizeof(Demande::where(['correspondant'=> $user->id])->get());
        }


        return view('demandes', [
            'demandes' => $demandes,
            'en_cours' => $total_en_cours,
            'final' => $total_final,
            'total' =>$total,
            'etat' => false
        ]);
    }

      public function delete($id) {

        $demande = Demande::findOrFail($id);
        $demande->delete();

        return back()->with('success','Demande supprim??e avec succ??s');
    }
}
