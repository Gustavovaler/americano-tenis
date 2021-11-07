<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\WelcomeController;
use App\Models\Player;
use App\Models\PlayerMatch;
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

Route::get('/',[WelcomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/matches', [App\Http\Controllers\ResultadoController::class, 'getPartidos']);
Route::get('/matches/calculate' , [PlayerController::class, 'autoCalculateMatches']);
route::post('/matches/edit' , [PlayerController::class, 'updateResult']);
Route::get('/posiciones', [App\Http\Controllers\ResultadoController::class, 'getPosiciones']);
Route::get('/players', function(){return Player::all();});
Route::post('/player', [PlayerController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
