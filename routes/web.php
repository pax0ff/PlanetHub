<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PlanetsController as PlanetsController;
use App\Services\APIService as ApiService;
Route::get('/', function () {
    return view('index');
});

Route::get('/jupiter',[PlanetsController::class,'jupiter']);

Route::get('/marte',[PlanetsController::class,'marte']);
Route::get('/mercur',[PlanetsController::class,'mercur']);
Route::get('/neptun',[PlanetsController::class,'neptun']);
Route::get('/pamant',[PlanetsController::class,'pamant']);
Route::get('/saturn',[PlanetsController::class,'saturn']);
Route::get('/uranus',[PlanetsController::class,'uranus']);
Route::get('/venus',[PlanetsController::class,'venus']);
Route::get('/sun',[PlanetsController::class,'sun']);

Route::get('/getPlanets/{planet}',[ApiService::class,'getPlanets']);

