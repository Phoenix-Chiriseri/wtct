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
        $currentDate = Carbon::now()->toDateString();    
        $totalPeopleForCurrentDay = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
        $currentDate = Carbon::today();
        $currentDate = now()->toDateString();
        $currentDate = '2023-08-10';
        $currentDate = '2023-08-10';

        $shiftCounts = DB::table('support_workers')
        ->select(
        DB::raw('SUM(CASE WHEN shift = "morning" THEN num_people ELSE 0 END) as morningshift'),
        DB::raw('SUM(CASE WHEN shift = "night" THEN num_people ELSE 0 END) as nightshift'),
        'date'
        )
        ->whereDate('date', '>=', $currentDate)
        ->groupBy('date')
        ->get();

        foreach ($shiftCounts as $shiftCount) {
        var_dump($shiftCount->date);
        var_dump($shiftCount->morningshift);
         }
        //this is for one shift.....
        //SELECT sum(num_people) as nightshift from support_workers where shift ='night' and date = '2023-08-10';
        //$totalNightShiftWorkers = DB::table('support_workers')
        //->selectRaw('SUM(CASE WHEN shift = "night" THEN 1 ELSE 0 END) AS total_night_shift_workers')
        //->whereDate('date', '>=', $currentDate)
        //->value('total_night_shift_workers');
        //var_dump($totalNightShiftWorkers);
        /*$shifts = SupportWorkers::whereDate('date', '>=', $currentDate)
            ->orderBy('date', 'asc')
            ->orderBy('shift', 'desc')
            ->paginate(6);
       $nightShiftWorkers = $shifts->filter(function ($shift) {
       return $shift->shift === 'night';
      });
     $totalNightShiftWorkers = $nightShiftWorkers->sum();
     var_dump($totalNightShiftWorkers);
        /*$shifts = SupportWorkers::whereDate('date', '>=', $currentDate)
            ->orderBy('date', 'asc')
            ->orderBy('shift', 'desc')
            ->paginate(6);*/
        //return view('viewResults', ['shifts' => $shifts])->with("totalJobs",$totalPeopleForCurrentDay)->with("shifts",$shifts);
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
