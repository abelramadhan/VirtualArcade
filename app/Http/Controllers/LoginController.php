<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(){
        return view('authentication.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $correctUser = False;
        if(User::where('username', $request['username'])->exists()){
            $correctUser = True;
        }
        
        if(!$correctUser){
            return back()->with('falseUser', 'Username is not registered! Please register an account.');
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect('home');
        }
        
        return back()->with('wrong', 'Sorry, wrong credentials.');
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
