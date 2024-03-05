<?php

use App\Http\Controllers\AutenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/users')->group(function(){
    Route::post('/sign_up',[AutenticationController::class,'sign_up']);
    Route::post('/autentication',[AutenticationController::class,'autentication']);
});
