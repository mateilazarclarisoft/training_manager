<?php

use App\Http\Controllers\DrillController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionDrillsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sort;

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
    return view('welcome');
});

Route::any('drills/search','App\Http\Controllers\DrillController@search');
Route::resource('drills', DrillController::class);

Route::resource('tags', TagController::class);

Route::any('sessions/search','App\Http\Controllers\SessionController@search');
Route::put('sessions/generate/{id}', [SessionController::class, 'generate'])->name('sessions.generate');
Route::put('sessions/regenerate/{id}', [SessionController::class, 'regenerate'])->name('sessions.regenerate');
Route::resource('sessions', SessionController::class);

Route::match(['get', 'put'], 'session_drills/create/{session_id}', [SessionDrillsController::class, 'search'])->name('session_drills.add_to_session');
Route::resource('session_drills', SessionDrillsController::class);

Route::match(['get', 'put'], 'session_drills/replace_list/{id}', [SessionDrillsController::class, 'replaceList'])->name('session_drills.replace_list');
Route::post('session_drills/replace/{id}', [SessionDrillsController::class, 'replace'])->name('session_drills.replace');
Route::any('session_drills/search/{id}','App\Http\Controllers\SessionDrillsController@search');