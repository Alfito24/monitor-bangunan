<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\StakeholdersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\VariabelController;
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

Route::get('/dashboard/{id}', [DashboardController::class, 'index']);
Route::get('/dashboard/profil/{proyekId}/{userId}', [DashboardController::class, 'profil']); //halaman detail user
Route::get('/dashboard/menu_utama/{proyekId}', [DashboardController::class, 'menuUtama']); //halaman menu utama
Route::get('/regisstakeholders', function () {
    return view('registerStakeholders');
}); //halaman tambah stakeholder
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [StakeholdersController::class, 'show']); //halaman register
Route::post('/register', [StakeholdersController::class, 'store']); //nyimpan data register

Route::post('/tambahSurvey', [SurveyController::class, 'storeSurvey']); //simpan survey
Route::get('/hasilsurvey/{surveyId}', [DashboardController::class, 'hasilSurvey'])->name('hasilSurvey');

Route::post('/proyekform', [ProyekController::class, 'store']); //nyimpan data proyek

Route::get('/pilihbangunan/{userId}', [ProyekController::class, 'index'])->name('pilihProyek'); //list proyek
Route::get('proyek/{proyekId}/pilihSurvey', [SurveyController::class, 'index'])->name('pilihSurvey'); //list survey
Route::get('proyek/survey/{surveyId}', [SurveyController::class, 'fill'])->name('isiSurvey'); //halaman isi survey
Route::post('proyek/survey/{surveyId}', [SurveyController::class, 'storehasilsurvey'])->name('simpanHasilSurvey'); //halaman isi survey

Route::get('/project', [ProyekController::class, 'show']); //halaman tambah proyek

Route::post('/tambahStakeholder', [StakeholdersController::class, 'storeStakeholder']); //simpan stakeholder yang terlibat dalam proyek

Route::get('/hapusStakeholder/{proyekId}/{userId}', [StakeholdersController::class, 'hapusStakeholder']); //Hapus stakeholder yang terlibat

Route::get('test', function (\Illuminate\Http\Request $request) {

    if ($request->result) {
        //hasil kalkulasi dilempar balik ke route ini dengan parameter URL
        //silahkan simpan ke DB agar tidak kalkulasi ulang
        dd(json_decode($request->result));
    } else {

        // formating

        $hasils = \App\Models\HasilSurvey::where('survey_id', 1)->get();

        $dataset = new \StdClass();
        $dataset->criterias = json_decode(\App\Models\Variabel::all()->toJson());

        foreach ($dataset->criterias as $i => $criteria) {
            // ditambah C diawal agar tidak bentrok ketika kalkulasi
            $dataset->criterias[$i]->id = 'c' . $criteria->id;
        }

        foreach ($hasils as $i => $row) {
            $dataset->respondents[$i] = new \StdClass();

            // ditambah R diawal agar tidak bentrok ketika kalkulasi
            $dataset->respondents[$i]->id = 'r' . $row->user_id;

            for ($j = 1; $j <= 21; $j++) {
                if ($row["exp_var" . $j]) {
                    $response = new \StdClass();

                    // ditambah C diawal agar tidak bentrok ketika kalkulasi
                    $response->criteriaId = 'c' . $j;
                    $response->expectation = $row["exp_var" . $j];
                    $response->reality = $row["real_var" . $j];

                    $dataset->respondents[$i]->responses[] = $response;
                }
            }
        }

        return view('rsbCalc', ['dataset' => $dataset]);
    }
});


Route::get('/rsbcalc/{surveyId}', [SurveyController::class, 'rsbcalc']);  //menghitung hasil survey dengan rsb algorithm
Route::get('/rsbcalc/store/{surveyId}', [SurveyController::class, 'storersbcalc']);
Route::post('/rsbcalc/store/{surveyId}', [SurveyController::class, 'storersbcalc2']); //menyimpan hasil rsbcalc ke dalam database


Route::get('/hapussurvey/{surveyId}', [SurveyController::class, 'hapussurvey']);

Route::get('/test2', function () {
    $Survey = \App\Models\Survey::find(1);

    return view('network-chart', ['rsb_score' => $Survey->rsb_score]);
});

Route::get('/testquery/{userId}', [QueryController::class, 'index']);
