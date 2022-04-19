<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
// session_start();

class RegisterController extends Controller
{
    public function register(){
        return view('pages.register');
    }
    public function postcontact(Request $req){
        Mail::send('pages.register',[
            'name' => $req->name,
            'email' => $req->email,
            // 'content' => $req->content,
        ], function($mail) use($req){
                $mail-> to('thongpt109@gmail.com',$req->name);
                $mail->from('$req->email');
                $mail->subject('Test mail');
        });
    }
}
