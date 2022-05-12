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
Route::get('/dashboard/profil/{id}', [DashboardController::class, 'profil']); //halaman detail user
Route::get('/dashboard/menu_utama/{proyekId}', [DashboardController::class, 'menuUtama']); //halaman menu utama
Route::get('/regisstakeholders', function () {
    return view('registerStakeholders');
}); //halaman tambah stakeholder
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [StakeholdersController::class, 'show']); //halaman register
Route::post('/register', [StakeholdersController::class, 'store']); //nyimpan data register

Route::get('/survey', [SurveyController::class, 'show']);
Route::post('/proyekform', [ProyekController::class, 'store']); //nyimpan data proyek

Route::get('/pilihproyek/{userId}', [ProyekController::class, 'index']); //list proyek
Route::get('/survey/proyek/{$id}', [SurveyController::class, 'index']);

Route::get('/project', [ProyekController::class, 'show']); //halaman tambah proyek


