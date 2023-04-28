<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TodoController;

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

Route::middleware('check.logged.in')->group(function() {
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register']);  
});

Route::middleware('auth')->group(function() {
    Route::get('/', [AppController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']); 

    Route::match(['get', 'post'], 'task', [TodoController::class, 'create']);
    Route::match(['get', 'post'], 'task/edit/{id}', [TodoController::class, 'edit']);
    Route::post('task/delete', [TodoController::class, 'delete']);
});

