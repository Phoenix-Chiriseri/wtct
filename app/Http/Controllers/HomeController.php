<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SupportWorkers;
use App\Models\HealthCareAssistants;
use App\Models\MentalHealthCareAssistants;
use App\Models\Midwives;
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
        $this->middleware('guest');
    }

    public function welcomeScreen(){

        $currentDate = now()->toDateString();
        $supportWorkers = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
        $healthCareAssistants= HealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $mentalHealthCareAssistants = MentalHealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $midwives = Midwives::whereDate('date', $currentDate)->sum('num_people');
        $rgns = RGN::whereDate('date', $currentDate)->sum('num_people');
        //get the authenticated user and the username
        return view('welcome')->with("supportWorkers",$supportWorkers)
            ->with("healthCareAssistants",$healthCareAssistants)
            ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)->with("midwives",$midwives)->with("currentDate",$currentDate);
        $currentDate = Carbon::now('Europe/London')->format('d-m-Y H:i:s');
        return view('welcome')->with("name",$name)->with("supportWorkers",$supportWorkers)
            ->with("healthCareAssistants",$healthCareAssistants)
            ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)->with("midwives",$midwives)->with("currentDate",$currentDate);
    }

    public function index()
    {
        $currentDate = now()->toDateString();
        $supportWorkers = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
        $healthCareAssistants= HealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $mentalHealthCareAssistants = MentalHealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $midwives = Midwives::whereDate('date', $currentDate)->sum('num_people');
        $rgns = RGN::whereDate('date', $currentDate)->sum('num_people');
        //get the authenticated user and the username
        $user = Auth::user();
        $name = $user->name;
        return view('home')->with("name",$name)->with("supportWorkers",$supportWorkers)
        ->with("healthCareAssistants",$healthCareAssistants)
        ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)->with("midwives",$midwives)->with("currentDate",$currentDate);
    }


    public function deleteRecords(){

       return view('deleteRecords');

    }

}
