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
        $currentDate = now()->toDateString();
        $totalPeopleForCurrentDay = RGN::whereDate('date', $currentDate)->sum('num_people');
        $shiftCounts = DB::table('r_g_n_s')
        ->select(
            DB::raw('SUM(CASE WHEN shift = "morning" THEN num_people ELSE 0 END) as morningshift'),
            DB::raw('SUM(CASE WHEN shift = "night" THEN num_people ELSE 0 END) as nightshift'),
            'date'
        )
        ->whereDate('date', '>=', $currentDate)
        ->groupBy('date')
        ->get();
        return view('viewRegisteredNurses', ['shiftCounts' => $shiftCounts])->with("totalJobs",$totalPeopleForCurrentDay)->with("total",$totalPeopleForCurrentDay);
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
