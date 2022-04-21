<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionLinesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [LoginController::class, 'index'])->name('index');

// USERS
Route::get('/login', [LoginController::class, 'redirect'])->name('users.login');
Route::get('/callback', [LoginController::class, 'callback'])->name('users.register');
Route::post('/register', [LoginController::class, 'registration'])->name('users.registration');
Route::get('/logout', [LoginController::class, 'logout'])->name('users.logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('users');

// USERS
Route::get('/account', [UserController::class, 'index'])->name('users.index');
Route::get('/account/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/account/edit/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/account/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// CLIENTS
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/create', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/edit/{client}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/edit/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// MISSIONS
Route::get('/clients/{client}/missions/create', [MissionController::class, 'create'])->name('missions.create');
Route::post('/clients/{client}/missions/create', [MissionController::class, 'store'])->name('missions.store');
Route::get('/missions/{mission}/edit', [MissionController::class, 'edit'])->name('missions.edit');
Route::put('/missions/{mission}/edit', [MissionController::class, 'update'])->name('missions.update');
Route::get('/missions/{mission}', [MissionController::class, 'show'])->name('missions.show');
Route::delete('/missions/{mission}', [MissionController::class, 'destroy'])->name('missions.destroy');

// MISSION LINES
Route::get('/missions/{mission}/mission_lines/create', [MissionLinesController::class, 'create'])->name('missionLines.create');
Route::post('/missions/{mission}/mission_lines/create', [MissionLinesController::class, 'store'])->name('missionLines.store');
Route::get('/mission-lines/{missionLine}/edit', [MissionLinesController::class, 'edit'])->name('missionLines.edit');
Route::put('/mission-lines/{missionLine}/edit', [MissionLinesController::class, 'update'])->name('missionLines.update');
Route::delete('/mission-lines/{missionLine}', [MissionLinesController::class, 'destroy'])->name('missionLines.destroy');

// QUOTE (devis)
Route::get('/mission/{mission}/quote', [MissionController::class, 'showQuote'])->name('quote.show');