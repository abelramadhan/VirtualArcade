<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ViewController extends Controller
{
    //
    public function home(){
        $username = Auth::id();
        $menu = 1;
        $leaderboard = User::select('username', 'highscoreAV AS highscore')
                        ->where('highscoreAV', '!=', '0')
                        ->orderBy('highscoreAV', 'desc')->get();        
        $game = 'average';
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu)
            ->with('game', $game)
            ->with('leaderboard', $leaderboard);
    }

    public function games(){
        $username = Auth::id();
        $menu = 2;
        $game = 'average';
        $leaderboard = User::select('username', 'highscoreAV AS highscore')
                        ->where('highscoreAV', '!=', '0')
                        ->orderBy('highscoreAV', 'desc')->get();    
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu)
            ->with('game', $game)
            ->with('leaderboard', $leaderboard);
    }

    public function leaderboardAV(){
        $username = Auth::id();
        $menu = 3;
        $game = 'average';
        $leaderboard = User::select('username', 'highscoreAV AS highscore')
                        ->where('highscoreAV', '!=', '0')
                        ->orderBy('highscoreAV', 'desc')->get();
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu)
            ->with('game', $game)
            ->with('leaderboard', $leaderboard);
    }

    public function leaderboard(Request $request){
        $username = Auth::id();
        $menu = 3;
        $game = $request->only('game-lead');
        $game = $game['game-lead'];
        $leaderboard = DB::table($game)->where('highscore', '!=', '0')->orderBy('highscore', 'desc')->get();
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu)
            ->with('game', $game)
            ->with('leaderboard', $leaderboard);
    }

    public function info(Request $request){
        $username = Auth::id();
        $menu = 4;
        $game = $request->only('game-lead');
        $game = 'average';
        $leaderboard = User::select('username', 'highscoreAV AS highscore')
                        ->where('highscoreAV', '!=', '0')
                        ->orderBy('highscoreAV', 'desc')->get();   
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu)
            ->with('game', $game)
            ->with('leaderboard', $leaderboard);
    }

    public function homeMenu($menu){
        $username = Auth::id();
        return view('home')
            ->with('username', $username)
            ->with('menu', $menu);
    }

    public function tetris(){
        $username = Auth::id();
        $currentHighscore = DB::table('tetris')->where('username', $username)->value('highscore');
        return view('games.balok')->with('currentHighscore', $currentHighscore);
    }
    
    public function sudoku(){
        $username = Auth::id();
        $currentHighscore = DB::table('sudokus')->where('username', $username)->value('highscore');
        return view('games.sudoku')->with('currentHighscore', $currentHighscore);
    }

    public function spaceInvader(){
        $username = Auth::id();
        $currentHighscore = DB::table('space_invaders')->where('username', $username)->value('highscore');
        return view('games.spacein')->with('currentHighscore', $currentHighscore);
    }

    public function snek(){
        $username = Auth::id();
        $currentHighscore = DB::table('sneks')->where('username', $username)->value('highscore');
        return view('games.snek')->with('currentHighscore', $currentHighscore);
    }
}
