<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(){
        return view('authentication.login');
    }

    public function cekLogin(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $data = $request->only('username', 'password');

        if (Auth::attempt($data)){
            return redirect('/home');
        } else {
            return back()->with('wrong', 'Maaf, data yang anda masukkan salah.');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
