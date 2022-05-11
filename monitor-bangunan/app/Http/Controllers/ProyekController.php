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
        Proyek::create([
            'namaProyek'=>$request->nama,
            'tanggalProyek'=>$request->tanggal,
            'keteranganProyek'=>$request->keterangan,
            'user_id'=>auth() -> user() -> id
        ]);
        return redirect()->action([DashboardController::class, 'index'], ['id'=>auth()->user()->id]);
    }
    public function index(){
        $proyeks = DB::table('proyeks')->get();
        return view('pilihproyek', compact('proyeks'));
    }
}
