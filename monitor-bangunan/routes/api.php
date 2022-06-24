<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
Route::get('/getkategori/{surveyId}', [DashboardController::class, 'getKategori'])->name('getkategori');
Route::get('/getpendidikan/{surveyId}', [DashboardController::class, 'getPendidikan'])->name('getpendidikan');
Route::get('/getusia/{surveyId}', [DashboardController::class, 'getUsia'])->name('getusia');
Route::get('/getpengetahuan/{surveyId}', [DashboardController::class, 'getPengetahuan'])->name('getpengetahuan');
