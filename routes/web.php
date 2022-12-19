<?php

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
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::post('/saveuser', [UserController::class, 'saveuser'])->name('saveuser');
Route::post('/storeuser', [UserController::class, 'storeuser'])->name('storeuser');
Route::get('/destroyuser/{id}', [UserController::class, 'destroyuser'])->name('destroyuser');
#
Route::get('/pseudocode', [UserController::class, 'pseudocode'])->name('pseudocode');
Route::post('/searchangka', [UserController::class, 'searchangka'])->name('searchangka');
