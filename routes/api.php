<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function() {
    Route::get('task/list', [TodoController::class, 'taskList']);
    Route::post('task', [TodoController::class, 'create']);
    Route::get('task/{id}', [TodoController::class, 'view']);
    Route::post('task/edit/{id}', [TodoController::class, 'edit']);
    Route::post('task/delete/{id}', [TodoController::class, 'delete']);

    Route::post('search', [TodoController::class, 'search']);
});

