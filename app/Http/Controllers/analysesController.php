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

        $analyses = Analyse::paginate(25);

        return view('analyses', [
            'analyses' => $analyses
        ]);
    }



      public function findeByCode($code) {

        $analyse = Analyse::where('code', $code)->first();

        return response()->json([
	      'analyse' => $analyse
	    ]);
    }
}
