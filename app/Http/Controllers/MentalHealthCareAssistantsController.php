<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthCareAssistants;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;

class MentalHealthCareAssistantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addDays(6)->toDateString();
        $totalPeopleForCurrentDay = MentalHealthCareAssistants::whereDate('date', '=', now()->toDateString())
        ->sum('num_people');
        $totalPeopleWithinWeek = MentalHealthCareAssistants::whereDate('date', '>=', $startDate)
        ->whereDate('date', '<=', $endDate)
        ->sum('num_people');

       $shiftCounts = DB::table('mental_health_care_assistants')
        ->select(
        DB::raw('SUM(CASE WHEN shift = "morning" THEN num_people ELSE 0 END) as morningshift'),
        DB::raw('SUM(CASE WHEN shift = "night" THEN num_people ELSE 0 END) as nightshift'),
        DB::raw('SUM(CASE WHEN shift = "late" THEN num_people ELSE 0 END) as lateshift'),
        DB::raw('SUM(CASE WHEN shift = "long" THEN num_people ELSE 0 END) as longshift'),
        'date'
       )
       ->whereDate('date', '>=', $startDate)
       ->whereDate('date', '<=', $endDate)
       ->groupBy('date')
       ->get();  
        return view('viewMentalHealthWorkers', ['shiftCounts' => $shiftCounts])->with("total",$totalPeopleWithinWeek)->with("today",$totalPeopleForCurrentDay);
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
        return view('mentalHealthCare')->with("shiftOptions",$shiftOptions)->with("supportWorkers");
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

        MentalHealthCareAssistants::create($validatedData);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(MentalHealthCareAssistants $mentalHealthCareAssistants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MentalHealthCareAssistants $mentalHealthCareAssistants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MentalHealthCareAssistants $mentalHealthCareAssistants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MentalHealthCareAssistants $mentalHealthCareAssistants)
    {
        //
    }
}
