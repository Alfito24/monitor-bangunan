<?php

namespace App\Http\Controllers;

use App\Models\Stakeholders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StakeholdersController extends Controller
{
    public function show()
    {
        return view('main.registerStakeholders');
    }
    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'nama' => $request->name,
            'peran' => $request->peran,
            'kategori' => $request->kategori,
            'pengetahuan' => $request->pengetahuan,
            'usia' => $request->usia,
            'pendidikan' => $request->pendidikan,
            'kategori' => $request->kategori,
            'password' => Hash::make($request->password)
        ]);
        // Stakeholders::create($validatedData);
        return redirect('/login');
    }
}
