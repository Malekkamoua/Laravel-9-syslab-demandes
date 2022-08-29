<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
       public function AllEmployees() {

        $employees = User::where('role', 'employee')->paginate(25);

         return view('employees', [
            'employees' => $employees
        ]);


    }
}