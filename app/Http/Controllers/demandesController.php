<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class demandesController extends Controller
{
     public function getAlldemandes() {

        $demandes = Demande::paginate(10);

        return view('demandes', [
            'demandes' => $demandes
        ]);
    }

     public function create(Request $request) {

        $clients = Client::all();
        $tasks = Task::all();

        return view('demande', [
            'clients' => $clients,
            'tasks' => $tasks
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