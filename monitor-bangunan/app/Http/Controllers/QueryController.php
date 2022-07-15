<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Proyek;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    //
    public function index($userId)
    {
        // DB::enableQueryLog();
        $proyek = DB::table('proyek_user')->join('proyeks', 'proyek_user.proyek_id', '=', 'proyeks.id')->where('user_id', $userId)->get();
        // $quries = DB::getQueryLog();
        // dd($quries);
        dd($proyek);
    }
}
