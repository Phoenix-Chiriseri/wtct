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
        //changed the middleware on the home controller from authenticated users to guest
        $this->middleware('guest');
    }

    //this is the function for the welcome screen that will return all the data to the welcome....
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
    }

    public function index()
    {

        $currentDate = now()->toDateString();
        $supportWorkers = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
        $healthCareAssistants= HealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $mentalHealthCareAssistants = MentalHealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $midwives = Midwives::whereDate('date', $currentDate)->sum('num_people');
        $rgns = RGN::whereDate('date', $currentDate)->sum('num_people');
        //get the user object and get the authenticated user from the database....
        $user = Auth::user();
        $name = $user->name;
        return view('home')->with("name",$name)->with("supportWorkers",$supportWorkers)
        ->with("healthCareAssistants",$healthCareAssistants)
        ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)->with("midwives",$midwives)->with("currentDate",$currentDate);
    }
}
