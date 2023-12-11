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
//Route::get("/",[UsersController::class,"get_view"]);

Route::get('/get_nombre',[UsersController::class,"get_nombre"]);
Route::post('/post_nombre',[UsersController::class,"post_nombres"])->name("post_nombre");
