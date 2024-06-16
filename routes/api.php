<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\MovieController;
use App\Http\Controllers\Api\V1\ScreeningController;
use App\Http\Controllers\Api\V1\TheaterController;
use App\Http\Controllers\Api\V1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function() {

    Route::apiResource('customers', CustomerController::class);
    Route::post('customers/login', [CustomerController::class, 'authenticateCustomer']);


    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('theaters', TheaterController::class);
    Route::apiResource('movies', MovieController::class);
    Route::apiResource('screenings', ScreeningController::class);

});