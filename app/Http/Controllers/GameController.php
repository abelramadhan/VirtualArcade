<?php

namespace App\Http\Controllers;

use App\Models\Snek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function submitScore(Request $request){
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
}
