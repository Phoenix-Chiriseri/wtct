<?php

namespace App\Http\Controllers;

use App\Models\MidWives;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MidWivesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('getMidwives')->with("shiftOptions",$shiftOptions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addDays(6)->toDateString();
        $totalPeopleForCurrentDay = Midwives::whereDate('date', '=', now()->toDateString())
        ->sum('num_people');
        $totalPeopleWithinWeek = Midwives::whereDate('date', '>=', $startDate)
        ->whereDate('date', '<=', $endDate)
        ->sum('num_people');

       $shiftCounts = DB::table('mid_wives')
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
        return view('viewClientMidwives', ['shiftCounts' => $shiftCounts])->with("total",$totalPeopleWithinWeek)
        ->with("today",$totalPeopleForCurrentDay);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'date' => 'required|date',
            'num_people' => 'required|integer',
            'shift' => 'required|in:morning,late,night,long',
        ]);
        Midwives::create($validatedData);
        return back()->with('success', 'Done');
    
    }

    public function deleteRecords(){

        return view('deleteMidwives');
    }

    /**
     * Display the specified resource.
     */
  

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
    
        $results = DB::table('mid_wives')
            ->whereBetween('date', [$from_date, $to_date])
            ->delete();
    
        return redirect()->back()->with('success', 'Midwives Saved');
        
    }

    /**
     * Show the form for editing the specified resource.
     */

}
