<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('login', 'LoginController@login')->name('login');

Route::group(['middleware' => ['auth']], function() {

});

Route::get('/', function () {
    return view('welcomeVA');
});

Route::get('/login',[App\Http\Controllers\LoginController::class, 'showLogin']);

Route::post('/login', [App\Http\Controllers\AuthController::class, 'logAuth'])->name('login.user');

Route::get('/register',[App\Http\Controllers\AuthController::class, 'showRegister']);

Route::post('/register',[App\Http\Controllers\AuthController::class, 'validateForm'])->name('validate.user');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/tetris', function () {
    return view('games.balok');
});

Route::get('/uler', function () {
    return view('games.snek');
});

Route::get('/sudoku', function () {
    return view('games.sudoku');
});

Route::get('/Pong', function () {
    return view('games.Pong');
});