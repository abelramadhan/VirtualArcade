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

Route::get('/', function () {
    return view('welcomeVA');
});

Route::get('/login', function () {
    return view('authentication.login');
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'logAuth'])->name('login.user');

Route::get('/register',[App\Http\Controllers\AuthController::class, 'showRegister'])->name('validateForm.user');

Route::post('/register',[App\Http\Controllers\AuthController::class, 'validateForm'])->name('validate.user');

Route::get('/home', function () {
    return view('home');
});

Route::get('/tetris', function () {
    return view('games.balok');
});

Route::get('/uler', function () {
    return view('games.snek');
});

Route::get('/sudoku', function () {
    return view('games.sudoku');
});

Route::get('/pacman', function () {
    return view('games.pacman');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
