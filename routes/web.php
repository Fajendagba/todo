<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/', [TodoController::class, 'index']);

Route::get('/', [TodoController::class, 'index']);

Route::get('create', [TodoController::class, 'create']);

Route::get('details/{todo}', [TodoController::class, 'details']);
Route::get('edit', [TodoController::class, 'edit']);
Route::post('update', [TodoController::class, 'update']);

Route::get('delete', [TodoController::class, 'delete']);
Route::post('store_todo_task', [TodoController::class, 'store_todo_task'])->name('store_todo_task');