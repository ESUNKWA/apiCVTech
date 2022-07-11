<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\loginController;
use App\Http\Controllers\cv\UtilusateursController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [loginController::class,'login']);
Route::group([ 'middleware' => 'auth:sanctum'], function(){
    //Route relative au controller UtilusateursController
    Route::resource('utilisateur', 'App\Http\Controllers\cv\UtilusateursController');
    Route::post('logout', [loginController::class,'logout']);

    //Route relative au controller ExperienceController
    Route::resource('experience', 'App\Http\Controllers\cv\ExperiencesProController');
});
