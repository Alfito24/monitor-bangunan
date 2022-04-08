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
        $validatedData=  $request->validate([
            'name' => 'required|max:25',
            'peran' => 'required',
            'kategori' => 'required',
            'pengetahuan' => 'required',
            'usia' => 'required',
            'pendidikan' => 'required',
        ]);
        if($validatedData['kategori'] == 'industri'){
            $validatedData['simbol'] = 'I';
        }
        if($validatedData['kategori'] == 'pemilik'){
            $validatedData['simbol'] = 'P';
        }
        if($validatedData['kategori'] == 'pengguna'){
            $validatedData['simbol'] = 'PB';
        }
        if($validatedData['kategori'] == 'masyarakat'){
            $validatedData['simbol'] = 'M';
        }
        Stakeholders::create($validatedData);
        return redirect('/');
    }
}
