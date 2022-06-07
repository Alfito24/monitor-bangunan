<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Variabel;
use DateTime;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function fill($surveyId)
    {

        if (Auth::user() == 'pemilik') {
            return view('dashboard');
        } else if (!(Auth::check())) {
            abort('403');
        } else {
            return view('isisurvey', ['surveyId' => $surveyId]);
        }
    }

    public function storeSurvey(Request $request)
    {
        dd($request->all());
        $idProyek = $request->proyek_id;
        // store surveys
        $survey = new Survey();
        $survey->nama_survey = $request->nama_survey;
        $survey->tanggal_dibuat = $request->tanggal_dibuat;
        $survey->tanggal_kadaluwarsa = $request->tanggal_kadaluwarsa;
        $survey->save();
        $newsurvey = DB::table('surveys')->latest('id')->first();
        // store survey_user
        $createDate = new DateTime();
        $responden_id = $request->input('responden');
        foreach($responden_id as $responden_id){
            DB::table('survey_user')->insert([
                'user_id' => $responden_id,
                'survey_id' => $newsurvey->id,
                'status' => 1,
                'created_at' => $createDate,
                'updated_at' => $createDate
            ]);
        }
        // store proyek_survey
        $proyek = Proyek::find($idProyek);
        $survey->proyek()->attach($proyek);
        return redirect()->back();
    }
    public function index($proyekId)
    {
        $survey = DB::table('proyek_survey')->join('surveys', 'surveys.id', '=','proyek_survey.survey_id')->where('proyek_id', $proyekId)->get();
        $user = DB::table('survey_user')->join('users', 'users.id', '=','survey_user.user_id')->where('user_id', Auth::id())->get();

        return view('survey.pilihsurvey', compact('survey', 'user'));
    }
}
