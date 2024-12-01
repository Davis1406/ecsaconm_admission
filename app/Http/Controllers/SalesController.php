<?php

namespace App\Http\Controllers;

use App\Models\EstimatesAdd;
use Illuminate\Http\Request;
use App\Models\Estimates;
use App\Models\Expense;
use DB;

class SalesController extends Controller
{

    /** View Payments Page */
    public function applications()
    {
       return view('applications.list');
    }
}
