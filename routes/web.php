<?php

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
// use App\Http\Controllers\TodoController; 
// Route::get('/todo', 'TodoController@index');
// Route::get('/todo/create', 'TodoController@create')->name('todo.create'); // 追記
// Route::post('/todo', 'TodoController@store')->name('todo.store');

// Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
// Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
// Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');



use Illuminate\Support\Facades\Route;

Route::get('/todo', 'TodoController@index');
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo', 'TodoController@store')->name('todo.store');


