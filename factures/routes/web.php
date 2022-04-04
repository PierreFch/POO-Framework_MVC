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
});


Route::get('/login', [LoginController::class, 'redirect'])->name('auth.login');
Route::get('/auth/callback', [LoginController::class, 'callback'])->name('auth.callback');
// Route::get('/register', [LoginController::class, 'register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'registration'])->name('auth.registration');
