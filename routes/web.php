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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'movies', 'middleware' => 'auth'], function () {
    // solicitar todos los productos
    Route::get('/', 'MovieController@index')->name('index');
    //solicitar un producto
    Route::get('/{id}', 'MovieController@show')->name('show');
    //sincronizar lista
    Route::post('/sync', 'MovieController@sync')->name('sync');
});
