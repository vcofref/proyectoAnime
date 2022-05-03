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

Route::get('/', 'SeriesController@index');

Route::resource('series', SeriesController::class);

Route::get('personajes/{id}', 'PersonajesController@index'); //Id Serie
Route::get('eliminarPersonaje/{id}', 'PersonajesController@delete');
Route::get('personaje/{id}','PersonajesController@show'); //Id Personaje
Route::post('personaje', 'PersonajesController@update');

Route::get('/buscar/{search?}', 'PersonajesController@search')->name('buscar');



Route::get('/miniatura/{filename}', 'SeriesController@getImagen')->name('miniatura');