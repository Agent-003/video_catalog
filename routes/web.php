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
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'FilmController@index')->name('main');
Route::post('/search', 'FilmController@search')->name('search');
Route::get('/search/{id}', 'FilmController@searchById')->name('search_film');


//Route::post('/', 'FilmController@search')->name('search');
//Route::post('/search', 'FilmController@search')->name('search');
//Route::post('/search', 'FilmController@search')->name('search');
//Route::post('/search', 'FilmController@searchByWord')->name('search');
//Route::get('/search/{id}', 'FilmController@searchById')->name('search_film');
//Route::get('/search', 'FilmController@index');
