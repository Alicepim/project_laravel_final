<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DataController extends Controller
{
    function emData() {
        $emData = Employee::all();
        $emCount = $emData->count();

        $emSalary = Employee::all();
        $emSalaryCound = 0;
        foreach($emSalary as $Count){
            $emSalaryCound += $Count->em_salary;
        }
        return view('detail', compact('emCount', 'emSalaryCound'));
    }
}
