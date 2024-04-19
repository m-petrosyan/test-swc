<?php

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


use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('user', [UserController::class, 'store']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', [UserController::class, 'get']);
    Route::resource('event', EventController::class)->only('index', 'store', 'show', 'destroy');
    Route::post('event/participant/{event}', [EventParticipantController::class, 'store']);
    Route::delete('event/participant/{event}', [EventParticipantController::class, 'destroy']);
});
