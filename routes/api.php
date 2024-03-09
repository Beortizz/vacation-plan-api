<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HolidayPlanController;





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

 Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('holiday-plans', HolidayPlanController::class);
    Route::post('/logout', [AuthController::class, 'logout'])
                ->name('logout');
 });



Route::post('/register', [AuthController::class, 'register'])
                ->middleware('guest')
                ->name('register');

Route::post('/login', [AuthController::class, 'login'])
                ->middleware('guest')
                ->name('login');

