<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Snek;
use App\Models\Tetris;
use App\Models\Sudoku;
use App\Models\Pong;
use App\Models\SpaceInvader;

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
        $request['password'] = bcrypt($request['password']);

        if ($occupied){
            return back()->with('occupied', 'Username sudah terpakai');
        } else {
            User::create([
                'username' => $request->username,
                'password'=> $request['password'],
            ]);

            Snek::create([
                'username' => $request->username,
            ]);

            Sudoku::create([
                'username' => $request->username,
            ]);

            Tetris::create([
                'username' => $request->username,
            ]);

            Pong::create([
                'username' => $request->username,
            ]);

            SpaceInvader::create([
                'username' => $request->username,
            ]);

            return redirect('/login');
        }
    }

    public function showRegister(){
        return view('authentication.register');
    }

    public function logAuth(Request $request){
        $correctUser = False;
        $approve = False;
        if(User::where('username', '=', $request['username'])->exists()){
            $correctUser = True;
        }

        if ($correctUser && (User::where('username', '=', $request['username'], 'AND', 'password', '=', $request['password']))){
            $approve = True;
        } 
        
        if(!$correctUser){
            return back()->with('falseUser', 'Username tidak terdaftar! Silahkan daftar.');
        }

        if ($approve) {
            return redirect('/home');
        } else {
            return back()->with('falseAuth', 'Password salah.');
        }
    }
}
