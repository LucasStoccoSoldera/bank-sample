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

 //Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::prefix('auth')->group(function () {
        Route::post('logout',          [\App\Http\Controllers\Auth\Api\LoginController::class, 'logout'])                      ->name('logout');
    });

    Route::prefix('bank')->group(function () {
        Route::get('/',          [\App\Http\Controllers\Api\bankController::class, 'index'])                                   ->name('allBanks');
        Route::get('/{id}',      [\App\Http\Controllers\Api\bankController::class, 'show'])                                    ->name('showBank');
        Route::post('/',         [\App\Http\Controllers\Api\bankController::class, 'store'])                                   ->name('storeBank');
        Route::put('/{id}',      [\App\Http\Controllers\Api\bankController::class, 'update'])                                  ->name('updateBank');
        Route::delete('/{id}',   [\App\Http\Controllers\Api\bankController::class, 'destroy'])                                 ->name('deleteBank');

        Route::get('/{id}/release',      [\App\Http\Controllers\Api\bankController::class, 'showFinancialTransaction'])       ->name('showFinancialTransaction');
    });

    Route::prefix('release')->group(function () {
        Route::get('/',          [\App\Http\Controllers\Api\FinancialTransactionController::class, 'index'])                   ->name('allBanks');
        Route::get('/{id}',      [\App\Http\Controllers\Api\FinancialTransactionController::class, 'show'])                    ->name('showBank');
        Route::post('/',         [\App\Http\Controllers\Api\FinancialTransactionController::class, 'store'])                   ->name('storeBank');
        Route::put('/{id}',      [\App\Http\Controllers\Api\FinancialTransactionController::class, 'update'])                  ->name('updateBank');
        Route::delete('/{id}',   [\App\Http\Controllers\Api\FinancialTransactionController::class, 'destroy'])                 ->name('deleteBank');
        // Route::apiResource('/', Api\FinancialTransactionController::class);
    });
 //});

Route::get('/', function () {
    return "Enjoy the Silence...";
});

Route::post('/auth/register',          [\App\Http\Controllers\Auth\Api\UserController::class, 'register'])                             ->name('register');
Route::post('/auth/login',          [\App\Http\Controllers\Auth\Api\LoginController::class, 'login'])                            ->name('login');
