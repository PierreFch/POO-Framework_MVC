<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
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

    return view('welcome');
});


Route::resource('users', UsersController::class)->middleware('auth'); // 'auth' car allias proposé par laravel (helpers.php)
//Route::get('/users', [UsersController::class, 'index'])->name('users.index');
//Route::post('/users', [UsersController::class, 'store'])->name('users.store');
//Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
//Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
//Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
//Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
//Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/authentication', [LoginController::class, 'authentication'])->name('auth.authentication');
Route::get('/register', [LoginController::class, 'register'])->name('auth.register');
Route::post('/registration', [LoginController::class, 'registration'])->name('auth.registration');
Route::get('/signout', [LoginController::class, 'signOut'])->name('auth.signout');

Route::get('/password', [PasswordController::class, 'forgot'])->name('password.forgot');
Route::post('/password',[PasswordController::class, 'sendEmail'])->name('password.sendEmail');
Route::get('/password-reset/{token}', [PasswordController::class, 'reset'])->name('password.reset');
Route::post('/password-reset/{token}', [PasswordController::class, 'update'])->name('password.update');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('admin');;
