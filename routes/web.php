<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home',[ViewController::class, 'home'])->name('home');
    Route::get('/info',[ViewController::class, 'info'])->name('info');
    Route::get('/games/tetris',[ViewController::class, 'tetris'])->name('tetris');
    Route::get('/games/sudoku',[ViewController::class, 'sudoku'])->name('sudoku');
    Route::get('/games/spaceinvader',[ViewController::class, 'spaceinvader'])->name('spaceinvader');
    Route::get('/games/snek',[ViewController::class, 'snek'])->name('snek');
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::get('/leaderboardAV',[ViewController::class, 'leaderboardAV'])->name('get_leaderboardAV');
    Route::get('/leaderboard',[ViewController::class, 'leaderboard'])->name('get_leaderboard');
    Route::get('/games',[ViewController::class, 'games'])->name('games');
    
    Route::post('/snek', [GameController::class, 'submitScoreSnek'])->name('submit.snek');
    Route::post('/tetris', [GameController::class, 'submitScoreTetris'])->name('submit.tetris');
    Route::post('/spaceinvader', [GameController::class, 'submitScoreSpacein'])->name('submit.spacein');
    Route::post('/sudoku', [GameController::class, 'submitScoreSudoku'])->name('submit.sudoku');
});

Route::get('/', function(){
    return view('welcomeVA');
});

Route::get('/register',[AuthController::class, 'showRegister']);
Route::post('/register',[AuthController::class, 'validateForm'])->name('validate.user');
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.user');