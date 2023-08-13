<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SupportWorkers;
use App\Models\HealthCareAssistants;
use App\Models\MentalHealthCareAssistants;
use App\Models\RGN;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {

        $currentDate = now()->toDateString();
        $supportWorkers = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
        $healthCareAssistants= HealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $mentalHealthCareAssistants = MentalHealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $rgns = RGN::whereDate('date', $currentDate)->sum('num_people');
        $user = Auth::user();
        $name = $user->name;
        return view('home')->with("name",$name)->with("supportWorkers",$supportWorkers)
        ->with("healthCareAssistants",$healthCareAssistants)
        ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns);
    }
}
