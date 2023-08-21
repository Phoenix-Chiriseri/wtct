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
        $totalPeopleForCurrentDay = RGN::whereDate('date', '=', now()->toDateString())
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

    public function deleteRecords(){

        return view('deleteRegisteredNurses');


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
    
        $results = DB::table('r_g_n_s')
            ->whereBetween('date', [$from_date, $to_date])
            ->delete();
    
        return redirect()->back()->with('success', 'Support Workers deleted successfully.');
        
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
