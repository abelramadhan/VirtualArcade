<?php

namespace App\Http\Controllers;

use App\Models\Snek;
use App\Models\Tetris;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{
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
        
        return redirect()->back();
    }
}
