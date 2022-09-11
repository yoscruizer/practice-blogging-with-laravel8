<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HomeController::class , 'index']);
Route::get('/dashboard', [HomeController::class , 'dashboard']);
Route::get('/logout', [HomeController::class , 'logout']);

Route::get('/login' , [LoginController::class , 'create']);
Route::post('/login' , [LoginController::class , 'authenticate']);
Route::post("/logout",[LogoutController::class,"store"])->name("logout");


Route::get('/register' , [RegisterController::class , 'create']);
Route::post('/register' , [RegisterController::class , 'store']);



Route::resource('posts', PostController::class);




