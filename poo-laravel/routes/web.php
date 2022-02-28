<?php

use App\Http\Controllers\UsersController;
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

    dump(\App\Models\User::all());

    return view('welcome');
});

Route::get('/users', [UsersController::class, 'index']);
Route::get('/user/{user}', [UsersController::class, 'show']);
Route::get('/users/addUser', function () {
    return view('users.addUser');
});
Route::post('/users/addUser', function () {
    return 'Formulaire reçu !';
});

