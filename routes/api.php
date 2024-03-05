<?php

use App\Http\Controllers\AutenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/users')->group(function(){
    Route::post('sign_in',[AutenticationController::class,'sign_in']);
    Route::post('sign_up',[AutenticationController::class,'sign_up']);
    Route::post('logout',[AutenticationController::class,'logout']);
});
