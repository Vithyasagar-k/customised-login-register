<?php

use App\Http\Controllers\CustomeAuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CustomeAuthController::class,'login'])->name('login');
Route::get('/register',[CustomeAuthController::class,'register'])->name('register');


Route::post('/register-user',[CustomeAuthController::class,'registerUser'])->name('register.user');
Route::post('/login-user',[CustomeAuthController::class,'loginUser'])->name('login.user');

Route::get('/home',[CustomeAuthController::class,'home']);