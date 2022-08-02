<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use Illuminate\Http\Request;

class analysesController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

     public function getAllAnalyses() {
        $user = Auth::user();

        $analyses = Analyse::all()->get();

        return view('analyses', [
            'analyses' => $analyses
        ]);
    }

      public function findeById($id) {

        $analyse = Analyse::findOrFail($id);

        return view('analyse', [
            'analyse' => $analyse
        ]);
    }
}
