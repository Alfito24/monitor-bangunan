<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function show(){
        if(Auth::user()=='pemilik'){
            return view('dashboard');
        } else if(!(Auth::check())){
            abort('403');
        } else{
           return view('survey');
        }
    }
}
