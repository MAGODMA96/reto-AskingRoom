<?php

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
    return view('welcome');
});

Auth::routes();


Route::get('/movie', 'MovieController@movies_index')->name('movie');

Route::get('/movies/index', 'MovieController@index')->name('index');

Route::post('/syncronizar', 'MovieController@sync')->name('syncronizar');

Route::post('/eliminar/movie', 'MovieController@eliminar_movie')->name('eliminar.movie');


