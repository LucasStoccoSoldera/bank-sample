<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/', function () {
    return "Enjoy the Silence...";
});

Route::prefix('bank')->group(function () {
    Route::get('/',          [\App\Http\Controllers\Api\bankController::class, 'index'])      ->name('allBanks');
    Route::get('/{id}',      [\App\Http\Controllers\Api\bankController::class, 'show'])       ->name('showBank');
    Route::post('/',         [\App\Http\Controllers\Api\bankController::class, 'store'])      ->name('storeBank');
    Route::put('/{id}',      [\App\Http\Controllers\Api\bankController::class, 'update'])     ->name('updateBank');
    Route::delete('/{id}',   [\App\Http\Controllers\Api\bankController::class, 'destroy'])    ->name('deleteBank');
});

Route::prefix('release')->group(function () {
    Route::get('/',          [\App\Http\Controllers\Api\FinancialTransactionController::class, 'index'])      ->name('allBanks');
    Route::get('/{id}',      [\App\Http\Controllers\Api\FinancialTransactionController::class, 'show'])       ->name('showBank');
    Route::post('/',         [\App\Http\Controllers\Api\FinancialTransactionController::class, 'store'])      ->name('storeBank');
    Route::put('/{id}',      [\App\Http\Controllers\Api\FinancialTransactionController::class, 'update'])     ->name('updateBank');
    Route::delete('/{id}',   [\App\Http\Controllers\Api\FinancialTransactionController::class, 'destroy'])    ->name('deleteBank');
   // Route::apiResource('/', Api\FinancialTransactionController::class);
});


