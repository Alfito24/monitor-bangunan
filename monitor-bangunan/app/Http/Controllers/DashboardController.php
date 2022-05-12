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
        if (Auth::user()->kategori == 'pemilik') {
            return view('dashboard.main', compact('users'));
        } else {
            abort(403);
        }
    }
    public function profil($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        if (Auth::user()->kategori == 'pemilik') {
            return view('dashboard.profil', compact('users'));
        } else {
            abort(403);
        }
    }

    public function menuUtama($proyekId)
    {
        $users = User::where('id', auth()->user()->id)->first();
        $proyek = Proyek::where('id', $proyekId)->first();
        if (Auth::user()->kategori == 'pemilik') {
            return view('dashboard.menu-utama', compact('users','proyek'));
        } else {
            abort(403);
        }
    }

    public function viewproyek($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        if (Auth::user()->kategori == 'pemilik') {
            return view('dashboard.tambahproyek', compact('users'));
        } else {
            abort(403);
        }
    }
    public function main($id)
    {
        $proyeks = DB::table('proyeks')->where('user_id', $id)->get();
        if (Auth::user()->kategori == 'pemilik') {
            return view('dashboard.main', compact('proyeks'));
        } else {
            abort(403);
        }
    }
}
