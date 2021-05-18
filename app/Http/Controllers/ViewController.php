<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function home(){
        return view('home');
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
