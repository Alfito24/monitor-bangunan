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
                    'proyek' =>$proyek,
                    'stakeholder' => $stakeholder,
                    'survey' => $survey,
                    'responden' =>$responden
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
}
