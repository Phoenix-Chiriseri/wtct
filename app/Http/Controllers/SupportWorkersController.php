<?php

namespace App\Http\Controllers;

use App\Models\SupportWorkers;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SupportWorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $currentDate = Carbon::now()->toDateString();   
        //$totalJobsForCurrentDay = SupportWorkers::whereDate('created_at', $currentDate)->count();  
        $totalPeopleForCurrentDay = SupportWorkers::whereDate('created_at', $currentDate)->sum('num_people');
        $shifts = SupportWorkers::whereDate('date', '>=', $currentDate)
            ->orderBy('date', 'asc')
            ->orderBy('shift', 'desc')
            ->paginate(5);
        return view('viewResults', ['shifts' => $shifts])->with("totalJobs",$totalPeopleForCurrentDay);
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
        //dd($request->input('shift'));
        SupportWorkers::create($validatedData);
        session()->flash("success","Success Message");
        return redirect('/');
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
