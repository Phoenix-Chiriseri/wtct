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
        //$shifts = SupportWorkers::whereDate('date', '>=', $currentDate)->get();
        $shifts = SupportWorkers::whereDate('date', '>=', $currentDate)
            ->orderBy('id', 'desc')
            ->get();
        return view('viewResults', ['shifts' => $shifts]);
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
         return redirect('/');
        //return view('welcome');
        //return redirect()->route('/')->with('success', 'Support Worker Added');
        //return view('welcome');
        //return view('/');
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
