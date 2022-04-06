<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');;


Route::get('/login', [LoginController::class, 'redirect'])->name('auth.login');
Route::get('/callback', [LoginController::class, 'callback'])->name('auth.register');
Route::post('/register', [LoginController::class, 'registration'])->name('auth.registration');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
