<?php

namespace App\Http\Controllers;

use App\Models\MidWives;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MidWives $midWives)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MidWives $midWives)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MidWives $midWives)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MidWives $midWives)
    {
        //
    }
}
