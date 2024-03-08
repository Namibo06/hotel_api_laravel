<?php

use App\Http\Controllers\AutenticationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SuitesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/users')->group(function(){
    Route::post('/sign_up',[AutenticationController::class,'sign_up']);
    Route::post('/autentication',[AutenticationController::class,'autentication']);
});

Route::prefix('v1/hotel')->group(function(){
    Route::post('/make_an_appointment',[HotelController::class,'make_an_appointment']);
    Route::get('/check_availability',[HotelController::class,'check_availability']);
});

Route::prefix('v1/suites')->group(function(){
    Route::get('/allSuites',[SuitesController::class,'allSuites']);
    Route::get('/suite/{id}',[SuitesController::class,'suite']);
});
