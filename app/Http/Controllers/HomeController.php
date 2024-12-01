<?php

namespace App\Http\Controllers;

use App\Models\FormModel;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    /** Main Dashboard */
    public function index()
    { 
        $applications = FormModel::getApplications();
        $userCount = User::count();

        $applicationCount = $applications->count();
        $uniqueEmailsCount = $applications->pluck('p_email')->unique()->count();
        $fee = $applicationCount * 50;

        $data['applicationCount'] = $applicationCount;
        $uniqueEmailsCount = $applications->pluck('p_email')->unique()->count();

        $data = [
            'applicationCount' => $applicationCount,
            'uniqueEmailsCount' => $uniqueEmailsCount,
            'userCount' => $userCount,
            'fee' => $fee,
        ];

        return view('dashboard.dashboard', $data);
    }
    
}
