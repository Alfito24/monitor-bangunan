<?php

namespace App\Http\Controllers;

use App\Models\Stakeholders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StakeholdersController extends Controller
{
    public function show()
    {
        return view('main.register2');
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

    public function storeStakeholder(Request $request){
     $users = DB::table('users')->get();
     $email = $request->email;
     foreach($users as $u){
         if($u->email == $email){
            DB::table('proyek_user')->insert([
                'proyek_id' => $request->proyekId,
                'user_id' => $u->id,
            ]);
         };
     }
     return 'success';
    }
}
