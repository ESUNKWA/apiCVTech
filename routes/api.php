<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cv\UtilusateursController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('utilisateur', 'App\Http\Controllers\cv\UtilusateursController');
Route::post('utilisateur.login', [UtilusateursController::class,'login']);
