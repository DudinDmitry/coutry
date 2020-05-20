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

Route::get('/admin','mainController@admin');
Route::match(['post','get'],'/admin/add','mainController@add');
Route::get('/admin/delete','mainController@delete');
Route::get('/admin/delete/{id}','mainController@deleteId')->where('id','[0-9]+');
Route::get('/admin/edit','mainController@edit');