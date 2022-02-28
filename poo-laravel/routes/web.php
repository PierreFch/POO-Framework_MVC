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
Route::get('/users/add', [UsersController::class, 'create']);
Route::post('/users/add', function () {
    return 'Formulaire reçu !';
});

