<?php

namespace App\Http\Controllers;

use App\Models\NewPosition;
use Illuminate\Http\Request;

class NewPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('newPosition')->with("shiftOptions",$shiftOptions);
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
            'position'=>'required|string',
            'date' => 'required|date',
            'num_people' => 'required|integer',
            'shift' => 'required|in:morning,late,night,long',
        ]);
        NewPosition::create($validatedData);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewPosition $newPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewPosition $newPosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewPosition $newPosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewPosition $newPosition)
    {
        //
    }
}
