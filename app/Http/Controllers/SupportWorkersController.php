<?php

namespace App\Http\Controllers;

use App\Models\SupportWorkers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;


class SupportWorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $currentDate = now()->toDateString();
        $totalPeopleForCurrentDay = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
        $shiftCounts = DB::table('support_workers')
        ->select(
            DB::raw('SUM(CASE WHEN shift = "morning" THEN num_people ELSE 0 END) as morningshift'),
            DB::raw('SUM(CASE WHEN shift = "night" THEN num_people ELSE 0 END) as nightshift'),
            'datce'
        )
        ->whereDate('date', '>=', $currentDate)
        ->groupBy('date')
        ->get();
        return view('viewResults', ['shiftCounts' => $shiftCounts])->with("totalJobs",$totalPeopleForCurrentDay);
        
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
        
            $validatedData = $request->validate([
            'date' => 'required|date',
            'num_people' => 'required|integer',
            'shift' => 'required|in:morning,late,night,long',
        ]);

        SupportWorkers::create($validatedData);
        session()->flash("success","Success Message");
        return redirect('viewResults');
    }
    /**
     * Display the specified resource.
     */
    public function show(SupportWorkers $supportWorkers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportWorkers $supportWorkers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportWorkers $supportWorkers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportWorkers $supportWorkers)
    {
        //
    }
}
