<?php

namespace App\Http\Controllers;

use App\Models\Stakeholders;
use Illuminate\Http\Request;

class StakeholdersController extends Controller
{
    public function show(){
        return view('registerStakeholders');
    }
    public function store(Request $request){
        Stakeholders::create([
            'nama'=>$request->name,
            'peran'=>$request->peran,
            'kategori'=>$request->kategori,
            'pengetahuan'=>$request->pengetahuan,
            'usia'=>$request->usia,
            'pendidikan'=>$request->pendidikan,
            'kategori' => 'D'
        ]);
        // Stakeholders::create($validatedData);
        return redirect('/');
    }
}
