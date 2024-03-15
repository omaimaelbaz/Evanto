<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganizateurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdressController;


use  App\Http\Middleware;



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
Route::get('/admin', [UserController::class, 'adminDashboard'])->middleware('auth');


Route::get('/signIn', [AuthController::class, 'login'])->name('login');
Route::get('/signUp', [AuthController::class, 'register']);

//authentication

Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/register', [AuthController::class, 'registerUser']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/check', [AuthController::class, 'getCurrentUserId']);


//user

Route::get('/user', [UserController::class, 'users']);
Route::get('/details/{id}', [UserController::class, 'aficherdetails']);






// check status user

Route::get('user/{id}', [UserController::class, 'checkStatus']);

// categories table
Route::get('/category', [CategoryController::class, 'category']);


// organizateur

Route::get('/organizateur', [ OrganizateurController::class, 'organizateur'])->middleware('organisateur');
Route::get('/event', [ OrganizateurController::class, 'aficherevent']);
Route::get('/reservation', [OrganizateurController::class, 'ReservationView']);
// insert event
Route::get('/addevent', [ OrganizateurController::class, 'addevent']);
Route::post('/insertevent', [ OrganizateurController::class, 'insert']);

//update event
Route::get('/update/{id}', [ OrganizateurController::class, 'updateevent']);
Route::post('/edit/{id}', [ OrganizateurController::class, 'editeEvent']);

Route::get('//delete/{id}', [ OrganizateurController::class, 'delete']);







// serach
Route::get('/searchEvent/{value}', [ UserController::class, 'searchEvent']);

Route::get('/filter/{value}', [ UserController::class, 'filterEvent']);





// reservationn

Route::get('/reservernow/{id}', [ReservationController::class, 'reserver']);

Route::get('/AcceptEventOrganisateur', [UserController::class, 'AcceptEventOrganisateur']);
Route::get('/acceptRefuseEvet/{action}/{id}', [UserController::class, 'acceptRefuseEvet']);















