<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->kategori=='pemilik' || Auth::guest())
        {
            return view('dashboard');
        } else{
            abort(403);
        }
    }
}
