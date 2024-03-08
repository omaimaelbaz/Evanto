<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganizateurController;



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
//     return view('user.index');
// });
Route::get('/', [UserController::class, 'index']);


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/signIn', [AuthController::class, 'login']);
Route::get('/signUp', [AuthController::class, 'register']);

//authentication

Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/register', [AuthController::class, 'registerUser']);

//user

Route::get('/user', [UserController::class, 'users']);

// check status user

Route::get('user/{id}', [UserController::class, 'checkStatus']);

// categories table
Route::get('/category', [CategoryController::class, 'category']);


// organizateur

Route::get('/organizateur', [ OrganizateurController::class, 'organizateur']);
Route::get('/event', [ OrganizateurController::class, 'aficherevent']);









