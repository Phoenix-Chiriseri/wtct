<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportWorkersController;
use App\Http\Controllers\HealthCareAssistantsController;
use App\Http\Controllers\MentalHealthCareAssistantsController;
use App\Http\Controllers\RGNController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\MidwivesController;


Route::get('/',function(){
    return view("welcome");
});
Route::get('/viewClientSupportWorkers', [SupportWorkersController::class, 'index'])->name("viewClientSupportWorkers");
Route::get('/viewClientHealthCareWorkers', [HealthCareAssistantsController::class, 'index'])->name("viewClientHealthCareWorkers");
Route::get('/viewClientRegisteredNurses', [RGNController::class, 'index'])->name("viewClientRegisteredNurses");
Route::get('/viewClientMentalHealthNurses', [MentalHealthCareAssistantsController::class, 'getWorkers'])->name("viewClientMentalHealthNurses");
Route::get('/showClientMentalHealthWorkers', [MentalHealthCareAssistantsController::class, 'index'])->name("showClientMentalHealthWorkers");
Route::get('/getSupportWorkers', [SupportWorkersController::class, 'getWorkers']);
Route::get('/getHealthCareWorkers', [HealthCareAssistantsController::class, 'getWorkers']);
Route::get('/getRGN', [RGNController::class, 'getWorkers']);
Route::get('/getMentalHealthCareWorkers', [MentalHealthCareAssistantsController::class, 'getWorkers']);
Route::post('/createSupportWorker', [SupportWorkersController::class, 'store'])->name("createSupportWorker")->middleware('admin');
Route::post('/createHealthCareAssistant', [HealthCareAssistantsController::class, 'store'])->name("createHealthCareAssistant");
Route::post('/createRGN', [RGNController::class, 'store'])->name("createRGN");
Route::post('/createMentalHealthWorker', [MentalHealthCareAssistantsController::class, 'store'])->name("createMentalHealthWorker");
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('viewResults', [SupportWorkersController::class, 'index'])->name("viewResults");
Route::get('removeEntry', [SupportWorkersController::class, 'removeEntry'])->name("removeEntry");
Route::post('removeEntry', [SupportWorkersController::class, 'actionRemoveEntry'])->name("removeEntry");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getNewPosition', [App\Http\Controllers\PositionController::class, 'index'])->name('getNewPosition');
Route::post('/postNewPosition', [App\Http\Controllers\PositionController::class, 'store'])->name('postNewPosition');
Route::get('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecords'])->name('deleteRecords');
Route::get('/deleteFromHealthWorkers', [App\Http\Controllers\HealthCareAssistantsController::class, 'deleteRecords'])->name('deleteFromHealthWorkers');
Route::post('/deleteFromHealthWorkers', [App\Http\Controllers\HealthCareAssistantsController::class, 'deleteRecordsAction'])->name('deleteRecords');
Route::get('/deleteMentalHealthCare', [App\Http\Controllers\MentalHealthCareAssistantsController::class, 'deleteRecords'])->name('deleteRecords');
Route::post('/deleteMentalHealthAction', [App\Http\Controllers\MentalHealthCareAssistantsController::class, 'deleteRecordsAction'])->name('deleteMentalHealthAction');
Route::post('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecordsAction'])->name('deleteRecords');
Route::post('/deleteFromSupportWorkers', [App\Http\Controllers\SupportWorkersController::class, 'deleteRecordsAction'])->name('deleteRecords');
Route::get('/deleteRegisteredNurses', [App\Http\Controllers\RGNController::class, 'deleteRecords'])->name('deleteRegisteredNurses');
Route::post('/deleteRegisteredNurses', [App\Http\Controllers\RGNController::class, 'deleteRecordsAction'])->name('deleteRegisteredNurses');
Route::get('/getMidwives', [App\Http\Controllers\MidwivesController::class, 'index'])->name('getMidwives');
Route::post('/createMidwives', [App\Http\Controllers\MidwivesController::class, 'store'])->name('createMidwives');
Route::get('viewClientMidwives',[App\Http\Controllers\MidwivesController::class,'create'])->name('viewClientMidwives');
Route::get('/deleteMidwives',[App\Http\Controllers\MidwivesController::class,'deleteRecords'])->name('deleteMidwives');
Route::post('/deleteMidwives',[App\Http\Controllers\MidwivesController::class,'deleteRecordsAction'])->name('deleteMidwives');