<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Analyse;
use App\Models\Demande;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $demande = Demande::findOrFail($id);

        $analyses_db_array = [];

        foreach (json_decode($demande->analyses) as $analyse) {
            $analyse_db = Analyse::where('code', $analyse)->first();
            array_push($analyses_db_array, $analyse_db);
        }

        $data = [
            'demande' => $demande,
            'analyses' =>$analyses_db_array
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('demande_patient.pdf');
    }
}