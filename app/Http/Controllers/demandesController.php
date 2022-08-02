<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class demandesController extends Controller
{
     public function getAlldemandes() {
        $user = Auth::user();

        $demandes = Demande::all()->get();

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
      public function delete($id) {

        $demande = Demande::findOrFail($id);
        $demande->delete();

        return back()->with('success','Demande supprimés avec succés');
    }
}
