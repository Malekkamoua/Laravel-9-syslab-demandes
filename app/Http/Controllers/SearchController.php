<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Analyse;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller {

     public function searchAnalyses(Request $request){

        $search = $request->input('search');

        $analyses = Analyse::query()
                    ->where('code', 'LIKE', "%{$search}%")
                    ->orWhere('nom', 'LIKE', "%{$search}%")
                    ->paginate(25);

        return view('analyses', compact('analyses'));
    }

    public function searchDemandes(Request $request){
        $user = Auth::user();
        $search = $request->input('search');

        if($user->role == "admin") {
          $demandes = Demande::query()
                    ->where('num_carte', 'LIKE', "%{$search}%")
                    ->orWhere('num_dossier', 'LIKE', "%{$search}%")
                    ->orWhere('nom', 'LIKE', "%{$search}%")
                    ->orWhere('etat_dossier', 'LIKE', "%{$search}%")
                    ->paginate(25);

            $total_en_cours = sizeof(Demande::where(['etat_dossier'=> 'en cours'])->get());
            $total_final = sizeof(Demande::where(['etat_dossier'=> 'final'])->get());
            $total = sizeof(Demande::all());

        } else{
            $demandes = Demande::query()
                    ->where('num_dossier', 'LIKE', "%{$search}%")
                    ->orWhere('nom', 'LIKE', "%{$search}%")
                    ->orWhere('etat_dossier', 'LIKE', "%{$search}%")
                    ->where(['correspondant'=> $user->id])
                    ->paginate(25);

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

        return view('demandes', compact('demandes'));
    }

     public function searchCorrespondants(Request $request){

        $search = $request->input('search');

        $employees = User::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code_labo', 'LIKE', "%{$search}%")
                    ->paginate(25);

        return view('employees', compact('employees'));
    }

}