<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportWorkersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $shiftOptions = [
        'morning' => 'Morning Shift',
        'late' => 'Late Shift',
        'night' => 'Night Shift',
        'long' => 'Long Day',
    ];
    return view('welcome')->with("shiftOptions",$shiftOptions);
});
Route::post('/createSupportWorker', [SupportWorkersController::class, 'store'])->name("createSupportWorker");
Route::get('viewResults', [SupportWorkersController::class, 'index'])->name("viewResults");

