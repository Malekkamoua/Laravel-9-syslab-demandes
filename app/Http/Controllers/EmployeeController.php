<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller {

    public function AllEmployees() {

        $employees = User::where('role', 'corr')->orderBy('created_at', 'desc')->paginate(25);

         return view('employees', [
            'employees' => $employees
        ]);
    }

    public function addCorrespondant(Request $request) {

        $correspondant = new User();
        try {

            $correspondant->name = $request->name;
            $correspondant->email = $request->email;
            $correspondant->code_labo = $request->code_labo;
            $correspondant->password = Hash::make('secret1234');

            $correspondant->save();

        } catch (\Exception $e) {

            return back()->with('error','L\'email '.$request->email.' est déja utlisé');
        }

        return back()->with('success','Correspondant ajouté avec succés');

    }

    //returns correspondant by id
    public function findByid($id) {

        $correspondant = User::where('id', $id)->first();

        return response()->json([
	      'correspondant' => $correspondant
	    ]);
    }

     public function update(Request $request, $id) {

        $correspondant = User::where('id', $id)->first();

        try {

            $correspondant->name = $request->name;
            $correspondant->email = $request->email;
            $correspondant->code_labo = $request->code_labo;

            $correspondant->save();

        } catch (\Exception $e) {

            return back()->with('error','L\'email '.$request->email.'ou le code'.$request->code_labo.' est déja utlisé');
        }

        return back()->with('success','Correspondant mit à jours avec succés');

    }

    //returns demandes by user id
    public function findByUser($id) {

            $demandes = Demande::where(['correspondant'=> $id])->orderBy('created_at', 'desc')->paginate(25);
            $total_en_cours = sizeof(Demande::where(['etat_dossier'=> 'en cours', 'correspondant'=> $id])->get());
            $total_final = sizeof(Demande::where(['etat_dossier'=> 'final', 'correspondant'=> $id])->get());
            $total = sizeof(Demande::where(['correspondant'=> $id])->get());

           return view('demandes', [
            'demandes' => $demandes,
            'en_cours' => $total_en_cours,
            'final' => $total_final,
            'total' =>$total,
            'etat' => true
        ]);
    }
}
