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
        // return redirect('dashboard/menu_utama/{proyekId}', 302, ['proyekId'=>$proyek->id]);
        return redirect('dashboard/menu_utama/'.$proyek->id);
    }
    public function index($userId){
        $proyeks = DB::table('proyek_user')->join('proyeks', 'proyek_user.proyek_id', '=', 'proyeks.id')->get();
        return view('pilihproyek', compact('proyeks'));
    }
}
