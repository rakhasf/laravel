<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/tasks',[TaskController::class, 'index']);
Route::get('/tasks/{param}', [TaskController::class, 'show']); //show
Route::post('/tasks', [TaskController::class, 'store']); // store
Route::patch('/tasks/{key}', [TaskController::class, 'update']); // update
Route::delete('/tasks/{key}', [TaskController::class, 'delete']); //delete