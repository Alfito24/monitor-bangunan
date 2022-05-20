<?php

namespace App\Http\Controllers;

use App\Models\Stakeholders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
    $email = $request->email;
    $users = DB::table('users')->where('users.email', $email)->get();
    if(!$users){
        return redirect()->back()->with('fail', 'Email tidak ditemukan');
    }else{
        foreach($users as $user){
            DB::table('proyek_user')->insertGetId([
                'proyek_id' => $request->proyekId,
                'user_id' => $user->id,
            ]);
        }
         return redirect()->back();
    }
    }

    public function hapusStakeholder($proyekId, $userId){
        DB::table('proyek_user')->where([['user_id', $userId], ['proyek_id', $proyekId]])->delete();
        return redirect()->back();
    }
}
