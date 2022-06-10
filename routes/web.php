<?php

use App\Http\Controllers\DrillController;
use App\Http\Controllers\TagController;
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

Route::resource('drills', DrillController::class);
Route::resource('tags', TagController::class);

Route::prefix('algorithms')->group(function () {
    Route::get('/sort',  [Sort::class, 'show']);

    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });    
});

Route::any('search','App\Http\Controllers\DrillController@search');