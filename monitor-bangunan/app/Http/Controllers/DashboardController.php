<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Survey;
use App\Models\User;
use App\Models\Variabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index($id)
    {
        $users = User::where('id', $id)->first();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.main', ['users' => $users]);
        } else {
            abort(403);
        }
    }
    public function profil($proyekId, $userId)
    {
        $users = DB::table('users')->where('id', $userId)->first();
        $proyek = DB::table('proyeks')->where('id', $proyekId)->first();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.profil', compact('users', 'proyek'));
        } else {
            abort(403);
        }
    }

    public function menuUtama($proyekId)
    {
        $users = DB::table('users')->where('id', '=',  Auth::id())->first();
        $stakeholder = DB::table('proyek_user')->join('users', 'users.id', '=', 'proyek_user.user_id')->where('proyek_user.proyek_id', $proyekId)->get();
        $proyek = DB::table('proyeks')->where('id', $proyekId)->get();

        $survey = DB::table('proyek_survey')
            ->join('surveys', 'surveys.id', '=', 'proyek_survey.survey_id')
            ->where('proyek_id', $proyekId)
            ->get();

        $responden = DB::table('survey_user')->join('users', 'users.id', '=', 'survey_user.user_id')->get();

        $listVariabel = Variabel::all();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view(
                'dashboard.menu-utama',
                [
                    'listVariabel' => $listVariabel,
                    'users' => $users,
                    'proyek' => $proyek,
                    'stakeholder' => $stakeholder,
                    'survey' => $survey,
                    'responden' => $responden
                ]
            );
        } else {
            abort(403);
        }
    }

    public function viewproyek($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.tambahproyek', compact('users'));
        } else {
            abort(403);
        }
    }
    public function main($id)
    {
        $proyeks = DB::table('proyeks')->where('user_id', $id)->get();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.main', compact('proyeks'));
        } else {
            abort(403);
        }
    }
    public function hasilSurvey($surveyId)
    {
        if (request()->ajax()) {
            return DB::table('survey_user')->join('surveys', 'survey_user.survey_id', '=', 'surveys.id')->where('survey_id', $surveyId)->get();
        }

        $id = $surveyId;

        $rsb_json = DB::table('surveys')->select('rsb_score')->where('id', $surveyId)->first();
        $rsb_php = json_decode($rsb_json->rsb_score);

        return view('dashboard.hsl-survey', ['id' => $id]);
    }

    public function getKategori($surveyId)
    {

        $data = DB::table('survey_user')
            ->join('surveys', 'surveys.id', '=', 'survey_user.survey_id')
            ->join('users', 'users.id', '=', 'survey_user.user_id')
            ->select('kategori', DB::raw('count(*) as total'))
            ->where('survey_id', $surveyId)
            ->groupBy('kategori')
            ->get();

        return \Response::json($data);
    }
    public function getPendidikan($surveyId)
    {

        $data = DB::table('survey_user')
            ->join('surveys', 'surveys.id', '=', 'survey_user.survey_id')
            ->join('users', 'users.id', '=', 'survey_user.user_id')
            ->select('pendidikan', DB::raw('count(*) as total'))
            ->where('survey_id', $surveyId)
            ->groupBy('pendidikan')
            ->get();

        return \Response::json($data);
    }
    public function getUsia($surveyId)
    {

        $data = DB::table('survey_user')
            ->join('surveys', 'surveys.id', '=', 'survey_user.survey_id')
            ->join('users', 'users.id', '=', 'survey_user.user_id')
            ->select('usia', DB::raw('count(*) as total'))
            ->where('survey_id', $surveyId)
            ->groupBy('usia')
            ->get();

        return \Response::json($data);
    }
    public function getPengetahuan($surveyId)
    {

        $data = DB::table('survey_user')
            ->join('surveys', 'surveys.id', '=', 'survey_user.survey_id')
            ->join('users', 'users.id', '=', 'survey_user.user_id')
            ->select('pengetahuan', DB::raw('count(*) as total'))
            ->where('survey_id', $surveyId)
            ->groupBy('pengetahuan')
            ->get();

        return \Response::json($data);
    }
}
