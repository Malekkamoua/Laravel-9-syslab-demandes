<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class analysesController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function getAllAnalyses() {

        $analyses = Analyse::paginate(25);

        return view('analyses', [
            'analyses' => $analyses
        ]);
    }

    public function findByid($id) {

        $analyse = Analyse::where('id', $id)->first();

        return response()->json([
	      'analyse' => $analyse
	    ]);
    }

    public function store(Request $request){
        $user = Auth::user();

        $analyse = new Analyse;

        $analyse->code = $request->input('code');
        $analyse->nom = $request->input('name');
        $analyse->nature_cond = $request->input('nature_cond');
        $analyse->concervation = $request->input('concervation');
        $analyse->delai = $request->input('delai');

        $analyse->save();

        return back()->with('success','Analyse ajoutée avec succés');
    }

    public function update(Request $request, $id){

        $analyse = Analyse::where('id', $id)->first();

        $analyse->nom = $request->input('name');
        $analyse->nature_cond = $request->input('nature_cond');
        $analyse->concervation = $request->input('concervation');
        $analyse->delai = $request->input('delai');

        $analyse->save();

        $saved = Analyse::where('id', $id)->first();

        return back()->with('success','Analyse mise à jour avec succés');

    }

    public function delete($id) {

        $analyse = Analyse::where('id', $id)->first();
        $analyse->delete();

        return back()->with('success','Analyse supprimée avec succés');
    }

}