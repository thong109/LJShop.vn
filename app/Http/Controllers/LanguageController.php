<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
// session_start();

class LanguageController extends Controller
{
    public function language(Request $request,$language){
        if($language){
            Session::put('language',$language);
        }
        return Redirect()->back();
    }
}
