<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportWorkersController;
use App\Http\Controllers\HealthCareAssistantsController;
use App\Http\Controllers\MentalHealthCareAssistantsController;
use App\Http\Controllers\RGNController;
use App\Http\Controllers\LoginController;

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

Route::get('/',function(){
    return view("welcome");
});
Route::get('/viewClientSupportWorkers', [SupportWorkersController::class, 'index'])->name("viewClientSupportWorkers");
Route::get('/viewClientHealthCareWorkers', [HealthCareAssistantsController::class, 'index'])->name("viewClientHealthCareWorkers");
Route::get('/viewClientRegisteredNurses', [RGNController::class, 'index'])->name("viewClientRegisteredNurses");
Route::get('/viewClientMentalHealthNurses', [MentalHealthCareAssistantsController::class, 'getWorkers'])->name("viewClientMentalHealthNurses");
Route::get('/getSupportWorkers', [SupportWorkersController::class, 'getWorkers']);
Route::get('/getHealthCareWorkers', [HealthCareAssistantsController::class, 'getWorkers']);
Route::get('/getRGN', [RGNController::class, 'getWorkers']);
Route::get('/getMentalHealthCareWorkers', [MentalHealthCareAssistantsController::class, 'getWorkers']);
Route::post('/createSupportWorker', [SupportWorkersController::class, 'store'])->name("createSupportWorker");
Route::post('/createHealthCareAssistant', [HealthCareAssistantsController::class, 'store'])->name("createHealthCareAssistant");
Route::post('/createRGN', [RGNController::class, 'store'])->name("createRGN");
Route::post('/createMentalHealthWorker', [MentalHealthCareAssistantsController::class, 'store'])->name("createMentalHealthWorker");
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('viewResults', [SupportWorkersController::class, 'index'])->name("viewResults");
Route::get('removeEntry', [SupportWorkersController::class, 'removeEntry'])->name("removeEntry");
Route::post('removeEntry', [SupportWorkersController::class, 'actionRemoveEntry'])->name("removeEntry");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
