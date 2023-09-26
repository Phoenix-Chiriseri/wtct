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
use App\Http\Controllers\HomeController;
use Carbon\Carbon;

//routes for the application are located in this file 
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/',[HomeController::class, 'welcomeScreen']);
Route::get('/viewClientSupportWorkers', [SupportWorkersController::class, 'index'])->name("viewClientSupportWorkers");
Route::get('/getStatistics', [StatisticsController::class, 'index'])->name("index")->middleware("auth");
Route::get('/viewClientHealthCareWorkers', [HealthCareAssistantsController::class, 'index'])->name("viewClientHealthCareWorkers");
Route::get('/viewClientRegisteredNurses', [RGNController::class, 'index'])->name("viewClientRegisteredNurses");
Route::get('/viewClientMentalHealthNurses', [MentalHealthCareAssistantsController::class, 'getWorkers'])->name("viewClientMentalHealthNurses");
Route::get('/showClientMentalHealthWorkers', [MentalHealthCareAssistantsController::class, 'index'])->name("showClientMentalHealthWorkers");
Route::get('/getSupportWorkers', [SupportWorkersController::class, 'getWorkers'])->middleware('auth');
Route::get('/getHealthCareWorkers', [HealthCareAssistantsController::class, 'getWorkers'])->middleware('auth');
Auth::routes();
Route::get('/getRGN', [RGNController::class, 'getWorkers'])->middleware('auth');
Route::get('/getMentalHealthCareWorkers', [MentalHealthCareAssistantsController::class, 'getWorkers'])->middleware('auth');
Route::post('/createSupportWorker', [SupportWorkersController::class, 'store'])->name("createSupportWorker")->middleware('auth');
Route::post('/createHealthCareAssistant', [HealthCareAssistantsController::class, 'store'])->name("createHealthCareAssistant")->middleware("auth");
Route::post('/createRGN', [RGNController::class, 'store'])->name("createRGN")->middleware("auth");
Route::post('/createMentalHealthWorker', [MentalHealthCareAssistantsController::class, 'store'])->name("createMentalHealthWorker")->middleware("auth");;
Route::get('viewResults', [SupportWorkersController::class, 'index'])->name("viewResults")->middleware("auth");;
Route::get('removeEntry', [SupportWorkersController::class, 'removeEntry'])->name("removeEntry")->middleware("auth");;
Route::post('removeEntry', [SupportWorkersController::class, 'actionRemoveEntry'])->name("removeEntry")->middleware("auth");;
//problematic route application is not logging out
Route::get('/home', [HomeController::class, 'index']);
Route::get('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecords'])->name('deleteRecords')->middleware('auth');
Route::get('/deleteFromHealthWorkers', [App\Http\Controllers\HealthCareAssistantsController::class, 'deleteRecords'])->name('deleteFromHealthWorkers')->middleware('auth');
Route::post('/deleteFromHealthWorkers', [App\Http\Controllers\HealthCareAssistantsController::class, 'deleteRecordsAction'])->name('deleteRecords')->middleware('auth');
Route::get('/deleteMentalHealthCare', [App\Http\Controllers\MentalHealthCareAssistantsController::class, 'deleteRecords'])->name('deleteRecords')->middleware('auth');
Route::post('/deleteMentalHealthAction', [App\Http\Controllers\MentalHealthCareAssistantsController::class, 'deleteRecordsAction'])->name('deleteMentalHealthAction')->middleware('auth');
Route::post('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecordsAction'])->name('deleteRecords')->middleware('auth');
Route::post('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecordsAction'])->name('deleteRecords')->middleware('auth');
Route::get('/deleteRegisteredNurses', [App\Http\Controllers\RGNController::class, 'deleteRecords'])->name('deleteRegisteredNurses')->middleware('auth');
Route::post('/deleteRegisteredNurses', [App\Http\Controllers\RGNController::class, 'deleteRecordsAction'])->name('deleteRegisteredNurses')->middleware('auth');
Route::get('/getMidwives', [App\Http\Controllers\MidwivesController::class, 'index'])->name('getMidwives')->middleware('auth');
Route::post('/createMidwives', [App\Http\Controllers\MidwivesController::class, 'store'])->name('createMidwives')->middleware('auth');
Route::get('viewClientMidwives',[App\Http\Controllers\MidwivesController::class,'create'])->name('viewClientMidwives');
Route::get('/deleteMidwives',[App\Http\Controllers\MidwivesController::class,'deleteRecords'])->name('deleteMidwives')->middleware('auth');;
Route::post('/deleteMidwives',[App\Http\Controllers\MidwivesController::class,'deleteRecordsAction'])->name('deleteMidwives')->middleware('auth');;