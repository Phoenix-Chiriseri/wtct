<?php

namespace App\Http\Controllers;

use App\Models\HealthCareAssistants;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;


class HealthCareAssistantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $currentDate = now()->toDateString();
        $totalPeopleForCurrentDay = HealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
        $shiftCounts = DB::table('health_care_assistants')
        ->select(
            DB::raw('SUM(CASE WHEN shift = "morning" THEN num_people ELSE 0 END) as morningshift'),
            DB::raw('SUM(CASE WHEN shift = "night" THEN num_people ELSE 0 END) as nightshift'),
            'date'
        )
        ->whereDate('date', '>=', $currentDate)
        ->groupBy('date')
        ->get();
        return view('viewHealthCare', ['shiftCounts' => $shiftCounts])->with("totalJobs",$totalPeopleForCurrentDay)->with("total",$totalPeopleForCurrentDay);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getWorkers(){

        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('healthcareWorkers')->with("shiftOptions",$shiftOptions)->with("supportWorkers");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'num_people' => 'required|integer',
            'shift' => 'required|in:morning,late,night,long',
        ]);

        HealthCareAssistants::create($validatedData);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthCareAssistants $healthCareAssistants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthCareAssistants $healthCareAssistants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthCareAssistants $healthCareAssistants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthCareAssistants $healthCareAssistants)
    {
        //
    }
}
