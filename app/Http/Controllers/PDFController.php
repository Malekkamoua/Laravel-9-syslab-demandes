<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\User;
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

        $correspondant = User::where('id', $demande->correspondant)->first();
        $ddn = Carbon::parse($demande->ddn)->format('d-m-Y');
        $date_prelev = Carbon::parse($demande->date_prelev)->format('d-m-Y h:m');
        $ddr = Carbon::parse($demande->ddr)->format('d-m-Y');
        $ddg = Carbon::parse($demande->ddg)->format('d-m-Y');
        $date_echo = Carbon::parse($demande->date_echo)->format('d-m-Y');
        $created_at = Carbon::parse($demande->created_at)->format('d-m-Y');

        $data = [
            'demande' => $demande,
            'ddn' => $ddn,
            'date_prelev' => $date_prelev,
            'ddr' => $ddr,
            'ddg' => $ddg,
            'date_echo' => $date_echo,
            'created_at' => $created_at,
            'analyses' =>$analyses_db_array,
            'correspondant' => $correspondant
        ];

        $pdf = PDF::loadView('myPDF', $data);
        $title = 'Demande '.$demande->id.'_'.$demande->nom.' '.$demande->prenom.'.pdf';
        return $pdf->download($title);
    }
}