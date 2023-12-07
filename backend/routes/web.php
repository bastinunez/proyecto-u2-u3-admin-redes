<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/obtener-csrf-token', [UsersController::class, 'getCsrfToken']);

Route::get('/nombres', [UsersController::class,"get_nombres"]);
Route::post('/post_nombre',[UsersController::class,"post_nombres"]);
