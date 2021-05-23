<?php

namespace App\Http\Controllers;

use App\Models\Snek;
use App\Models\SpaceInvader;
use App\Models\Tetris;
use App\Models\Sudoku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class GameController extends Controller
{
    public static function hitungAverage(){
        $username = Auth::id();
        $scoreSnek = Snek::where('username', $username)->value('highscore');
        $scoreTetris = Tetris::where('username', $username)->value('highscore');
        $scoreSpaceIn = SpaceInvader::where('username', $username)->value('highscore');
        $scoreSudoku = Sudoku::where('username', $username)->value('highscore');
        $average = ($scoreSnek + $scoreTetris + $scoreSpaceIn + $scoreSudoku) / 4;
        User::where('username', $username)->update([
            'highscoreAV' => $average
        ]);
    }

    public function submitScoreSnek(Request $request){
        $username = Auth::id();
        $score = $request['score'];
        $currentHighscore = Snek::where('username', $username)->value('highscore');
        if ($score > $currentHighscore){
            Snek::where('username', $username)
                ->update([
                    'highscore' => $score
                ]);
        }
        
        GameController::hitungAverage();
        return redirect()->back();
    }

    public function submitScoreTetris(Request $request){
        $username = Auth::id();
        $score = $request['score'];
        $currentHighscore = Tetris::where('username', $username)->value('highscore');
        if ($score > $currentHighscore){
            Tetris::where('username', $username)
                ->update([
                    'highscore' => $score
                ]);
        }
        GameController::hitungAverage();
        return redirect()->back();
    }

    public function submitScoreSpaceIn(Request $request){
        $username = Auth::id();
        $score = $request['score'];
        $currentHighscore = SpaceInvader::where('username', $username)->value('highscore');
        if ($score > $currentHighscore){
            SpaceInvader::where('username', $username)
                ->update([
                    'highscore' => $score
                ]);
        }
        GameController::hitungAverage();
        return redirect()->back();
    }

    public function submitScoreSudoku(Request $request){
        $username = Auth::id();
        $score = $request['score'];
        $currentHighscore = Sudoku::where('username', $username)->value('highscore');
        if ($score > $currentHighscore){
            Sudoku::where('username', $username)
                ->update([
                    'highscore' => $score
                ]);
        }
        GameController::hitungAverage();
        return redirect()->back();
    }

    public function submitScoreSudoku(Request $request){
        $username = Auth::id();
        $score = $request['score'];
        $currentHighscore = Sudoku::where('username', $username)->value('highscore');
        if ($score > $currentHighscore){
            Sudoku::where('username', $username)
                ->update([
                    'highscore' => $score
                ]);
        }
        
        return redirect()->back();
    }
}
