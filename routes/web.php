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

Route::get('/', 'mainController@main');
Route::get('/city/{id}','mainController@city')->where('id','[0-9]+');
Route::get('/city/attractions/{id}','mainController@attraction')->where('id','[0-9]+');