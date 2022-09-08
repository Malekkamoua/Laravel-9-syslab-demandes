<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
       public function AllEmployees() {

        $employees = User::where('role', 'employee')->paginate(25);

         return view('employees', [
            'employees' => $employees
        ]);
    }

    public function findeByUser($id) {
        $user = Auth::user();

        $demandes = Demande::where('user_id', $user->id)->get();

           return view('demandes', [
            'demandes' => $demandes
        ]);
    }
}
