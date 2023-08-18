<?php

namespace App\Http\Controllers;

use App\Models\RGN;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;

class RGNController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addDays(6)->toDateString();
        $totalPeopleForCurrentDay = SupportWorkers::whereDate('date', '=', now()->toDateString())
        ->sum('num_people');
        $totalPeopleWithinWeek = RGN::whereDate('date', '>=', $startDate)
        ->whereDate('date', '<=', $endDate)
        ->sum('num_people');

       $shiftCounts = DB::table('r_g_n_s')
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
        return view('viewRegisteredNurses', ['shiftCounts' => $shiftCounts])->with("total",$totalPeopleWithinWeek)
        ->with("today",$totalPeopleForCurrentDay);
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
        return view('getRGN')->with("shiftOptions",$shiftOptions)->with("supportWorkers");
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
        RGN::create($validatedData);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(RGN $rGN)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RGN $rGN)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RGN $rGN)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RGN $rGN)
    {
        //
    }
}
