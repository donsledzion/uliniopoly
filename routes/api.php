<?php

use App\Http\Controllers\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/games/{game}/retrieve',[GameController::class,'retrieve']);
Route::post('/games/{game}/throw',[GameController::class,'throw'])->middleware('auth:sanctum');
Route::post('/games/{game}/end-turn',[GameController::class,'endOfTurn'])->middleware('auth:sanctum');
