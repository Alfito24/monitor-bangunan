<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\StakeholdersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('main.home');
// });
Route::get('/', [PageController::class, 'landing']);

Route::get('/survey', function () {
    return view('survey');
});
Route::get('/dashboard/{id}', [DashboardController::class, 'index']);
Route::get('/dashboard/profil/{id}', [DashboardController::class, 'profil']);
Route::get('/dashboard/menu_utama/{id}', [DashboardController::class, 'menuUtama']);
Route::get('/dashboard/tambahproyek/{id}', [DashboardController::class, 'viewproyek']);
Route::get('/regisstakeholders', function () {
    return view('registerStakeholders');
});
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [StakeholdersController::class, 'show']);
Route::post('/register', [StakeholdersController::class, 'store']);

Route::get('/survey', [SurveyController::class, 'show']);


Route::get('/project', [ProyekController::class, 'show']);
Route::post('/proyekform', [ProyekController::class, 'store']);
