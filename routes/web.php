<?php

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

Route::get('/', function () { return view('welcome'); });

/*
|--------------------------------------------------------------------------
| HUMAN TYPES
|-------------------------------------------------------------------------- 
*/
//Route::get('get_types', App\Http\Controllers\HumanTypeController::class, 'get_types');
Route::resource('human_types', App\Http\Controllers\HumanTypeController::class);

/*
|--------------------------------------------------------------------------
| HUMANS
|-------------------------------------------------------------------------- 
*/
Route::resource('humans', App\Http\Controllers\HumanController::class);

/*
|--------------------------------------------------------------------------
| OFFICES
|-------------------------------------------------------------------------- 
*/
Route::resource('offices', App\Http\Controllers\OfficeController::class);