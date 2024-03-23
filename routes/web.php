<?php

use App\Http\Controllers\DrillController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionDrillsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sort;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfNotAuthorized;

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

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('test', function () {
    return view('test');
})->name('test');


Route::any('drills/search','App\Http\Controllers\DrillController@search')->name('drills.search');
Route::resource('drills', DrillController::class)->middleware(['auth']);

Route::resource('tags', TagController::class);

Route::any('sessions/search','App\Http\Controllers\SessionController@search');
Route::put('sessions/generate/{id}', [SessionController::class, 'generate'])->name('sessions.generate');
Route::put('sessions/regenerate/{id}', [SessionController::class, 'regenerate'])->name('sessions.regenerate');
Route::put('sessions/duplicate/{id}', [SessionController::class, 'duplicate'])->name('sessions.duplicate');
Route::resource('sessions', SessionController::class);

Route::match(['get', 'put'], 'session_drills/create/{session_id}', [SessionDrillsController::class, 'search'])->name('session_drills.add_to_session');
Route::resource('session_drills', SessionDrillsController::class);

Route::match(['get', 'put'], 'session_drills/replace_list/{id}', [SessionDrillsController::class, 'replaceList'])->name('session_drills.replace_list');
Route::post('session_drills/replace/{id}', [SessionDrillsController::class, 'replace'])->name('session_drills.replace');
Route::any('session_drills/search/{id}','App\Http\Controllers\SessionDrillsController@search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([RedirectIfNotAuthorized::class])->group(function () {

    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);
    
});
