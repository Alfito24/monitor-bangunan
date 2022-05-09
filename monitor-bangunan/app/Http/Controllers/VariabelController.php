<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variabel;
use Illuminate\Support\Facades\DB;
use Datetime;


class VariabelController extends Controller
{
    public function tambah($idproyek, $idstakeholder){
        $variabels = Variabel::all();

        return view('tambahVariabel', ['idproyek' => $idproyek, 'idstakeholder'=>$idstakeholder, 'variabels'=>$variabels]);
    }

    public function simpan(Request $request){
        $createdAt = new DateTime();

        $this->validate($request,[
            'variabel_id' => 'required'
        ]);

        DB::table('proyek_stakeholder_create')->insert([
            'variabel_id' => $request->variabel_id,
            'proyek_id' => $request->proyek_id,
            'stakeholder_id' => $request->stakeholder_id,
            'created_at' => $createdAt,
            'updated_at' => $createdAt
        ]);
    }

    public function tampilVariabel(){
        $variabels = Variabel::all();
    }
}
