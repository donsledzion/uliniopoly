<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FieldTypeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PricingTemplateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
        'prefix'=>'/',
        /*'middleware' => 'auth',*/
    ],function() {
        Route::resource('fieldtypes', FieldTypeController::class);
        Route::resource('boards', BoardController::class);
        Route::resource('games', GameController::class);
        Route::get('games/{game}/retrieve',[GameController::class,'retrieve']);
        Route::resource('fields', FieldController::class);
        Route::resource('pricingtemplates', PricingTemplateController::class);
    }
);

require __DIR__.'/auth.php';
