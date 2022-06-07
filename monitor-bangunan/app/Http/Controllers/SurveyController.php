<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Variabel;

class SurveyController extends Controller
{
    public function show()
    {

        if (Auth::user() == 'pemilik') {
            return view('dashboard');
        } else if (!(Auth::check())) {
            abort('403');
        } else {
            return view('survey');
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
        // store survey_user
        $survey->user()->attach(auth()->user()->id);
        // store proyek_survey
        $proyek = Proyek::find($idProyek);
        $survey->proyek()->attach($proyek);
        return redirect()->back();
    }
    public function fill()
    {
        return view('isisurvey');
    }
}
