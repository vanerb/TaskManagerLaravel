<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('task');

Route::post('/tasks', [TaskController::class, 'store'])->name('task');


Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks-edit');
Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks-update');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks-destroy');


Route::resource('categories', CategoryController::class);

Route::view('/register', 'auth.register')->name('register');


Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'destroy'])->name('logout');
Route::post('/register', [RegisteredUserController::class, 'store']);

//Route::resource('users', UserController::class);