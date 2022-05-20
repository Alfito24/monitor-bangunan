<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index($id)
    {
        $users = User::where('id', $id)->first();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.main', ['users'=>$users]);
        } else {
            abort(403);
        }
    }
    public function profil($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.profil', compact('users'));
        } else {
            abort(403);
        }
    }

    public function menuUtama($proyekId)
    {
        $users = DB::table('users')->where('id', '=',  Auth::id())->first();
        $stakeholder = DB::table('proyek_user')->join('users', 'users.id', '=', 'proyek_user.user_id')->where('proyek_user.proyek_id', $proyekId)->get();
        $proyek = DB::table('proyeks')->where('id', $proyekId)->get();
        if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') {
            return view('dashboard.menu-utama', compact('users','proyek', 'stakeholder'));
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
