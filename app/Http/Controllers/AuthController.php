<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function valideForm(Request $request){
        $request->validate([
            'username' => 'required|alpha|min:3|max:15',
            'password' => 'required|string|min:8|max:50'
        ]);
        $users = User::all();
        $occupied = False;
        foreach($users[0] as $i){
            if(strcmp($request['username'], $i) == 0){
                $occupied = True;
            }
        }
        if ($occupied){
            return back()->with('occupied', 'Username sudah terpakai');
        } else {
            return back()->with('success', 'Berhasil registrasi!');
        }
    }

    public function showRegister(){
        return view('authentication.register');
    }
}
