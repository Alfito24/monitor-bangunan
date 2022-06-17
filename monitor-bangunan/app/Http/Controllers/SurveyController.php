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
            $listVariabel = Variabel::all();

            return view('isisurvey', ['surveyId' => $surveyId, 'listVariabel' => $listVariabel]);
        }
    }



    public function storeSurvey(Request $request)
    {
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
        $user = DB::table('survey_user')->join('users', 'users.id', '=','survey_user.user_id')->where('user_id', Auth::id())->where('status', 1)->get();

        return view('survey.pilihsurvey', compact('survey', 'user'));
    }

    public function isiSurvey($surveyId){
        $listVariabel = Variabel::all();

        return view('survey.survey', compact('listVariabel', 'sruveyId'));
    }

    public function storehasilsurvey($surveyId, Request $request){
        $today = new DateTime();

        DB::table('hasil_survey')->insert([
            'user_id' => Auth::id(),
            'survey_id' => $surveyId,
            'exp_var1' => $request->ekspektasi1,
            'exp_var2' => $request->ekspektasi2,
            'exp_var3' => $request->ekspektasi3,
            'exp_var4' => $request->ekspektasi4,
            'exp_var5' => $request->ekspektasi5,
            'exp_var6' => $request->ekspektasi6,
            'exp_var7' => $request->ekspektasi7,
            'exp_var8' => $request->ekspektasi8,
            'exp_var9' => $request->ekspektasi9,
            'exp_var10' => $request->ekspektasi10,
            'exp_var11' => $request->ekspektasi11,
            'exp_var12' => $request->ekspektasi12,
            'exp_var13' => $request->ekspektasi13,
            'exp_var14' => $request->ekspektasi14,
            'exp_var15' => $request->ekspektasi15,
            'exp_var16' => $request->ekspektasi16,
            'exp_var17' => $request->ekspektasi17,
            'exp_var18' => $request->ekspektasi18,
            'exp_var19' => $request->ekspektasi19,
            'exp_var20' => $request->ekspektasi20,
            'exp_var21' => $request->ekspektasi21,
            'exp_var22' => $request->ekspektasi22,
            'real_var1' => $request->realita1,
            'real_var2' => $request->realita2,
            'real_var3' => $request->realita3,
            'real_var4' => $request->realita4,
            'real_var5' => $request->realita5,
            'real_var6' => $request->realita6,
            'real_var7' => $request->realita7,
            'real_var8' => $request->realita8,
            'real_var9' => $request->realita9,
            'real_var10' => $request->realita10,
            'real_var11' => $request->realita11,
            'real_var12' => $request->realita12,
            'real_var13' => $request->realita13,
            'real_var14' => $request->realita14,
            'real_var15' => $request->realita15,
            'real_var16' => $request->realita16,
            'real_var17' => $request->realita17,
            'real_var18' => $request->realita18,
            'real_var19' => $request->realita19,
            'real_var20' => $request->realita20,
            'real_var21' => $request->realita21,
            'real_var22' => $request->realita22,
            'created_at' => $today,
            'updated_at' => $today
        ]);

        DB::table('survey_user')->where('survey_id', $surveyId)->where('user_id', Auth::id())->update(
            ['status' => 2]
        );

        return redirect('pilihbangunan/'.Auth::id());
    }

    public function lihathasilsurvey($surveyId){

        $criteria = DB::table('variabels')->get();
        $responden = DB::table('hasil_survey')->join('users', 'users.id', '=', 'hasil_survey.user_id')->where('survey_id', $surveyId)->get();

    }

    public function hapussurvey($surveyId){
        DB::table('surveys')->where('id', $surveyId)->delete();

        return redirect()->back();
    }
}
