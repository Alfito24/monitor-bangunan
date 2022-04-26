<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;

class ProyekController extends Controller
{
    public function show(){
        return view('proyekform');
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
}
