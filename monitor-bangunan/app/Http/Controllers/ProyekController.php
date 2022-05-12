<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProyekController extends Controller
{
    public function show(){
        if(Auth::check()){
            return view('proyekform');
        } else{
            return abort('403');
        }
    }
    public function store(Request $request){
        $proyek = new Proyek();
        $proyek->namaProyek = $request->nama;
        $proyek->tanggalProyek = $request->tanggal;
        $proyek->keteranganProyek = $request->keterangan;
        $proyek->save();
        $proyek->stakeholder()->attach(auth()->user()->id);
        return redirect()->action([DashboardController::class, 'index'], ['id'=>auth()->user()->id]);
    }
    public function index(){
        $proyeks = DB::table('proyeks')->get();
        return view('pilihproyek', compact('proyeks'));
    }
}
