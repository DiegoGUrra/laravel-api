<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers','index');
    Route::get('/orders/{id}','show');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/event/{id}','show');
    Route::get('/events','index');
});

Route::controller(PurchaseController::class)->group(function () {
    Route::post('/purchase','store');

});