<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function home(){
        $username = Auth::id();
        return view('home')
            ->with('username', $username);
    }

    public function tetris(){
        return view('game.tetris');
    }
    
    public function sudoku(){
        return view('game.sudoku');
    }

    public function spaceInvader(){
        return view('game.spaceinvader');
    }

    public function snek(){
        return view('game.snek');
    }

    public function pong(){
        return view('game.pong');
    }
}
