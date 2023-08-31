<?php

namespace App\Http\Controllers;

use App\Models\SupportWorkers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class SupportWorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $startDate = Carbon::now()->toDateString();
        $endDate = Carbon::now()->addDays(6)->toDateString();
        $totalPeopleForCurrentDay = SupportWorkers::whereDate('date', '=', now()->toDateString())
        ->sum('num_people');
        $totalPeopleWithinWeek = SupportWorkers::whereDate('date', '>=', $startDate)
        ->whereDate('date', '<=', $endDate)
        ->sum('num_people');

       $shiftCounts = DB::table('support_workers')
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
        return view('viewResults', [
            'shiftCounts' => $shiftCounts,
            'total' => $totalPeopleWithinWeek,
            'today'=>$totalPeopleForCurrentDay
        ]);
    }

    public function deleteRecords(){
        return view('deleteSupportWorkers');
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

        $results = DB::table('support_workers')
            ->whereBetween('date', [$from_date, $to_date])
            ->delete();

        return redirect()->back()->with('success', 'Support Workers deleted successfully.');

    }

    public function getWorkers(){


        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('supportWorkers')->with("shiftOptions",$shiftOptions)->with("supportWorkers");
    }

    public function removeEntry(){

        $shiftOptions = [
            'morning' => 'Morning Shift',
            'late' => 'Late Shift',
            'night' => 'Night Shift',
            'long' => 'Long Day',
        ];
        return view('removeEntry')->with('shiftOptions',$shiftOptions);


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

        //var dump the results
        $validatedData = $request->validate([
            'date' => 'required|date',
            'num_people' => 'required|integer',
            'shift' => 'required|in:morning,late,night,long',
        ]);

        SupportWorkers::create($validatedData);
        return redirect('home');
    }


    public function actionRemoveEntry(Request $request)
    {
        $numOfPeople = -$request->input('num_people');
        $date = $request->input('date');
        $shift = $request->input('shift');
        $totalPeopleForCurrentDay = SupportWorkers::whereDate('date', $date)->sum('num_people');

          //Recalculate the shift counts for the selected shift type
           $shiftCounts = DB::table('support_workers')
            ->select(
                DB::raw('SUM(CASE WHEN shift = ? THEN num_people + ? ELSE 0 END) as selected_shift'),
                'date'
            )
            ->where('shift', $shift)  // Filter for the selected shift type
            ->whereDate('date', '>=', $date)
            ->groupBy('date')
            ->setBindings([$shift, $numOfPeople], 'select')
            ->get();
            return view('viewUpdatedResults', ['shiftCounts' => $shiftCounts])->with("totalJobs",$totalPeopleForCurrentDay)->with("total",$totalPeopleForCurrentDay);
    }
    /**
     * Display the specified resource.
     */
    public function show(SupportWorkers $supportWorkers)
    {
        //
    }


}
