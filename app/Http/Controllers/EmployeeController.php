<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function AllEmployees() {

        $employees = User::where('role', 'corr')->paginate(25);

         return view('employees', [
            'employees' => $employees
        ]);
    }

    public function addCorrespondant(Request $request) {

        $correspondant = new User();

        $correspondant->name = $request->name;
        $correspondant->email = $request->email;
        $correspondant->code_labo = $request->code_labo;
        $correspondant->name = $request->name;
        $correspondant->password = Hash::make('secret1234');

        $correspondant->save();

        $employees = User::where('role', 'corr')->paginate(25);

         return view('employees', [
            'employees' => $employees
        ]);
    }

    public function findByUser($id) {

        $demandes = Demande::where('correspondant', $id)->paginate(25);

           return view('demandes', [
            'demandes' => $demandes
        ]);
    }
}