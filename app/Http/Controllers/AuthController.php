<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function validateForm(Request $request){
        $request->validate([
            'username' => 'required|string|min:3|max:15',
            'password' => 'required|string|min:8|max:50'
        ]);
        $occupied = False;

        if (User::where('username', '=', $request['username'])->exists()) {
            $occupied = True;
        }

        if ($occupied){
            return back()->with('occupied', 'Username sudah terpakai');
        } else {
            User::create([
                'username' => $request->username,
                'password'=> $request->password,
            ]);
            return redirect('/login');
        }
    }

    public function showRegister(){
        return view('authentication.register');
    }
}
