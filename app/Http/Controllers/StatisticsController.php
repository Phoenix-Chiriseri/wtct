<?php

namespace App\Http\Controllers;

use App\Models\HealthCareAssistants;
use App\Models\MentalHealthCareAssistants;
use App\Models\MidWives;
use App\Models\RGN;
use App\Models\Statistics;
use App\Models\SupportWorkers;
use Illuminate\Http\Request;
use Auth;
class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('adminStatistics')->with("name",$name)->with("supportWorkers",$supportWorkers)
            ->with("healthCareAssistants",$healthCareAssistants)
            ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)
            ->with("midwives",$midwives)->with("currentDate",$currentDate);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistics $statistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistics $statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistics $statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistics $statistics)
    {
        //
    }
}
