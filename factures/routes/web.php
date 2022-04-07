<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\MissionController;
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


Route::get('/login', [LoginController::class, 'redirect'])->name('user.login');
Route::get('/callback', [LoginController::class, 'callback'])->name('user.register');
Route::post('/register', [LoginController::class, 'registration'])->name('user.registration');
Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('user');

Route::get('/account', [UserController::class, 'index'])->name('user.index');
Route::get('/account/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/account/edit', [UserController::class, 'update'])->name('user.update');

Route::get('/missions', [MissionController::class, 'create'])->name('missions.create')->middleware('user');
