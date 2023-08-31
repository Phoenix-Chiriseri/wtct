<?php

use App\Models\HealthCareAssistants;
use App\Models\MentalHealthCareAssistants;
use App\Models\MidWives;
use App\Models\RGN;
use App\Models\SupportWorkers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportWorkersController;
use App\Http\Controllers\HealthCareAssistantsController;
use App\Http\Controllers\MentalHealthCareAssistantsController;
use App\Http\Controllers\RGNController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatisticsController;
use Carbon\Carbon;

Route::get('/',function(){
    $currentDate = now()->toDateString();
    $supportWorkers = SupportWorkers::whereDate('date', $currentDate)->sum('num_people');
    $healthCareAssistants= HealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
    $mentalHealthCareAssistants = MentalHealthCareAssistants::whereDate('date', $currentDate)->sum('num_people');
    $midwives = Midwives::whereDate('date', $currentDate)->sum('num_people');
    $rgns = RGN::whereDate('date', $currentDate)->sum('num_people');
    //get the authenticated user and the username
    return view('welcome')->with("supportWorkers",$supportWorkers)
        ->with("healthCareAssistants",$healthCareAssistants)
        ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)->with("midwives",$midwives)->with("currentDate",$currentDate);
    $currentDate = Carbon::now('Europe/London')->format('d-m-Y H:i:s');
    return view('welcome')->with("name",$name)->with("supportWorkers",$supportWorkers)
        ->with("healthCareAssistants",$healthCareAssistants)
        ->with("mentalHealthCareAssistants",$mentalHealthCareAssistants)->with("rgns",$rgns)->with("midwives",$midwives)->with("currentDate",$currentDate);
});

Route::get('/viewClientSupportWorkers', [SupportWorkersController::class, 'index'])->name("viewClientSupportWorkers");
Route::get('/getStatistics', [StatisticsController::class, 'index'])->name("index")->middleware("auth");
Route::get('/viewClientHealthCareWorkers', [HealthCareAssistantsController::class, 'index'])->name("viewClientHealthCareWorkers");
Route::get('/viewClientRegisteredNurses', [RGNController::class, 'index'])->name("viewClientRegisteredNurses");
Route::get('/viewClientMentalHealthNurses', [MentalHealthCareAssistantsController::class, 'getWorkers'])->name("viewClientMentalHealthNurses");
Route::get('/showClientMentalHealthWorkers', [MentalHealthCareAssistantsController::class, 'index'])->name("showClientMentalHealthWorkers");
Route::get('/getSupportWorkers', [SupportWorkersController::class, 'getWorkers'])->middleware('auth');
Route::get('/getHealthCareWorkers', [HealthCareAssistantsController::class, 'getWorkers'])->middleware('auth');;
Route::get('/getRGN', [RGNController::class, 'getWorkers'])->middleware('auth');
Route::get('/getMentalHealthCareWorkers', [MentalHealthCareAssistantsController::class, 'getWorkers'])->middleware('auth');
Route::post('/createSupportWorker', [SupportWorkersController::class, 'store'])->name("createSupportWorker")->middleware('auth');
Route::post('/createHealthCareAssistant', [HealthCareAssistantsController::class, 'store'])->name("createHealthCareAssistant");
Route::post('/createRGN', [RGNController::class, 'store'])->name("createRGN");
Route::post('/createMentalHealthWorker', [MentalHealthCareAssistantsController::class, 'store'])->name("createMentalHealthWorker");
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('viewResults', [SupportWorkersController::class, 'index'])->name("viewResults");
Route::get('removeEntry', [SupportWorkersController::class, 'removeEntry'])->name("removeEntry");
Route::post('removeEntry', [SupportWorkersController::class, 'actionRemoveEntry'])->name("removeEntry");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/getNewPosition', [App\Http\Controllers\PositionController::class, 'index'])->name('getNewPosition');
//Route::post('/postNewPosition', [App\Http\Controllers\PositionController::class, 'store'])->name('postNewPosition');
Route::get('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecords'])->name('deleteRecords')->middleware('auth');;
Route::get('/deleteFromHealthWorkers', [App\Http\Controllers\HealthCareAssistantsController::class, 'deleteRecords'])->name('deleteFromHealthWorkers')->middleware('auth');;
Route::post('/deleteFromHealthWorkers', [App\Http\Controllers\HealthCareAssistantsController::class, 'deleteRecordsAction'])->name('deleteRecords')->middleware('auth');;
Route::get('/deleteMentalHealthCare', [App\Http\Controllers\MentalHealthCareAssistantsController::class, 'deleteRecords'])->name('deleteRecords')->middleware('auth');;
Route::post('/deleteMentalHealthAction', [App\Http\Controllers\MentalHealthCareAssistantsController::class, 'deleteRecordsAction'])->name('deleteMentalHealthAction')->middleware('auth');
Route::post('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecordsAction'])->name('deleteRecords')->middleware('auth');
Route::post('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecordsAction'])->name('deleteRecords')->middleware('auth');
Route::get('/deleteRegisteredNurses', [App\Http\Controllers\RGNController::class, 'deleteRecords'])->name('deleteRegisteredNurses')->middleware('auth');
Route::post('/deleteRegisteredNurses', [App\Http\Controllers\RGNController::class, 'deleteRecordsAction'])->name('deleteRegisteredNurses')->middleware('auth');
Route::get('/getMidwives', [App\Http\Controllers\MidwivesController::class, 'index'])->name('getMidwives')->middleware('auth');
Route::post('/createMidwives', [App\Http\Controllers\MidwivesController::class, 'store'])->name('createMidwives');
Route::get('viewClientMidwives',[App\Http\Controllers\MidwivesController::class,'create'])->name('viewClientMidwives');
Route::get('/deleteMidwives',[App\Http\Controllers\MidwivesController::class,'deleteRecords'])->name('deleteMidwives');
Route::post('/deleteMidwives',[App\Http\Controllers\MidwivesController::class,'deleteRecordsAction'])->name('deleteMidwives');
