<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function home(){
        $username = Auth::id();
        $menu = 1;
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu);
    }

    public function homeMenu($menu){
        $username = Auth::id();
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu);
    }

    public function tetris(){
        return view('games.balok');
    }
    
    public function sudoku(){
        return view('games.sudoku');
    }

    public function spaceInvader(){
        return view('games.spacein');
    }

    public function snek(){
        return view('games.snek');
    }

    public function pong(){
        return view('games.pong');
    }
}
