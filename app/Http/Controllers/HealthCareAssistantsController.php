<?php

namespace App\Http\Controllers;

use App\Models\HealthCareAssistants;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class HealthCareAssistantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(  )
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addDays(6)->toDateString();
        $totalPeopleForCurrentDay = HealthCareAssistants::whereDate('date', '=', now()->toDateString())
        ->sum('num_people');
        $totalPeopleWithinWeek = HealthCareAssistants::whereDate('date', '>=', $startDate)
        ->whereDate('date', '<=', $endDate)
        ->sum('num_people');
       $shiftCounts = DB::table('health_care_assistants')
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
        return view('viewHealthCare', ['shiftCounts' => $shiftCounts])->with("total",$totalPeopleWithinWeek)->with("today",$totalPeopleForCurrentDay);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    protected function normalizeGuessedAbilityName($ability)
    {
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
        return back()->with('success', 'Done');
    }

    public function deleteRecords(){


        return view('deleteHealthCareWorkers');
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

    public function deleteRecordsAction(Request $request){

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $results = DB::table('health_care_assistants')
            ->whereBetween('date', [$from_date, $to_date])
            ->delete();

        return redirect()->back()->with('success', 'Health care workers deleted successfully.');
    }

    /**
     * Update the specified resource in storage.
     */

}
